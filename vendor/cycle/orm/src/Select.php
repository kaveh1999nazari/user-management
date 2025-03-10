<?php

declare(strict_types=1);

namespace Cycle\ORM;

use Cycle\Database\Injection\Parameter;
use Cycle\Database\Query\SelectQuery;
use Cycle\ORM\Heap\Node;
use Cycle\ORM\Service\EntityFactoryInterface;
use Cycle\ORM\Service\MapperProviderInterface;
use Cycle\ORM\Service\SourceProviderInterface;
use Cycle\ORM\Select\JoinableLoader;
use Cycle\ORM\Select\QueryBuilder;
use Cycle\ORM\Select\RootLoader;
use Cycle\ORM\Select\ScopeInterface;
use Spiral\Pagination\PaginableInterface;

/**
 * Query builder and entity selector. Mocks SelectQuery. Attention, Selector does not mount RootLoader scope by default.
 *
 * Trait provides the ability to transparently configure underlying loader query.
 *
 * @method $this distinct()
 * @method $this where(...$args)
 * @method $this andWhere(...$args);
 * @method $this orWhere(...$args);
 * @method $this having(...$args);
 * @method $this andHaving(...$args);
 * @method $this orHaving(...$args);
 * @method $this orderBy($expression, $direction = 'ASC');
 * @method $this forUpdate()
 * @method $this whereJson(string $path, mixed $value)
 * @method $this orWhereJson(string $path, mixed $value)
 * @method $this whereJsonContains(string $path, mixed $value, bool $encode = true, bool $validate = true)
 * @method $this orWhereJsonContains(string $path, mixed $value, bool $encode = true, bool $validate = true)
 * @method $this whereJsonDoesntContain(string $path, mixed $value, bool $encode = true, bool $validate = true)
 * @method $this orWhereJsonDoesntContain(string $path, mixed $value, bool $encode = true, bool $validate = true)
 * @method $this whereJsonContainsKey(string $path)
 * @method $this orWhereJsonContainsKey(string $path)
 * @method $this whereJsonDoesntContainKey(string $path)
 * @method $this orWhereJsonDoesntContainKey(string $path)
 * @method $this whereJsonLength(string $path, int $length, string $operator = '=')
 * @method $this orWhereJsonLength(string $path, int $length, string $operator = '=')
 * @method mixed avg($identifier) Perform aggregation (AVG) based on column or expression value.
 * @method mixed min($identifier) Perform aggregation (MIN) based on column or expression value.
 * @method mixed max($identifier) Perform aggregation (MAX) based on column or expression value.
 * @method mixed sum($identifier) Perform aggregation (SUM) based on column or expression value.
 *
 * @template-covariant TEntity of object
 */
class Select implements \IteratorAggregate, \Countable, PaginableInterface
{
    // load relation data within same query
    public const SINGLE_QUERY = JoinableLoader::INLOAD;

    // load related data after the query
    public const OUTER_QUERY = JoinableLoader::POSTLOAD;

    private RootLoader $loader;
    private QueryBuilder $builder;
    private MapperProviderInterface $mapperProvider;
    private Heap\HeapInterface $heap;
    private SchemaInterface $schema;
    private EntityFactoryInterface $entityFactory;

    /**
     * @param class-string<TEntity>|string $role
     */
    public function __construct(
        ORMInterface $orm,
        string $role,
    ) {
        $this->heap = $orm->getHeap();
        $this->schema = $orm->getSchema();
        $this->mapperProvider = $orm->getService(MapperProviderInterface::class);
        $this->entityFactory = $orm->getService(EntityFactoryInterface::class);
        $this->loader = new RootLoader(
            $orm->getSchema(),
            $orm->getService(SourceProviderInterface::class),
            $orm->getFactory(),
            $orm->resolveRole($role),
        );
        $this->builder = new QueryBuilder($this->loader->getQuery(), $this->loader);
    }

    /**
     * Create new Selector with applied scope. By default no scope used.
     *
     * @return static<TEntity>
     */
    public function scope(?ScopeInterface $scope = null): self
    {
        $this->loader->setScope($scope);

        return $this;
    }

    /**
     * Get Query proxy.
     */
    public function getBuilder(): QueryBuilder
    {
        return $this->builder;
    }

    /**
     * Compiled SQL query, changes in this query would not affect Selector state (but bound parameters will).
     */
    public function buildQuery(): SelectQuery
    {
        return $this->loader->buildQuery();
    }

    /**
     * Shortcut to where method to set AND condition for entity primary key.
     *
     * @psalm-param string|int|list<string|int>|object ...$ids
     *
     * @return static<TEntity>
     */
    public function wherePK(string|int|array|object ...$ids): self
    {
        $pk = $this->loader->getPrimaryFields();

        if (\count($pk) > 1) {
            return $this->buildCompositePKQuery($pk, $ids);
        }
        $pk = \current($pk);

        return \count($ids) > 1
            ? $this->__call('where', [$pk, new Parameter($ids)])
            : $this->__call('where', [$pk, \current($ids)]);
    }

    /**
     * Attention, column will be quoted by driver!
     *
     * @param string|null $column When column is null DISTINCT(PK) will be generated.
     */
    public function count(?string $column = null): int
    {
        if ($column === null) {
            // @tuneyourserver solves the issue with counting on queries with joins.
            $pk = $this->loader->getPK();
            $column = \is_array($pk)
                ? '*'
                : \sprintf('DISTINCT(%s)', $pk);
        }

        return (int) $this->__call('count', [$column]);
    }

    /**
     * @return static<TEntity>
     */
    public function limit(int $limit): self
    {
        $this->loader->getQuery()->limit($limit);

        return $this;
    }

    /**
     * @return static<TEntity>
     */
    public function offset(int $offset): self
    {
        $this->loader->getQuery()->offset($offset);

        return $this;
    }

    /**
     * Request primary selector loader to pre-load relation name. Any type of loader can be used
     * for data pre-loading. ORM loaders by default will select the most efficient way to load
     * related data which might include additional select query or left join. Loaded data will
     * automatically pre-populate record relations. You can specify nested relations using "."
     * separator.
     *
     * Examples:
     *
     *     // Select users and load their comments (will cast 2 queries, HAS_MANY comments)
     *     User::find()->with('comments');
     *
     *     // You can load chain of relations - select user and load their comments and post related to comment
     *     User::find()->with('comments.post');
     *
     *     // We can also specify custom where conditions on data loading, let's load only public comments.
     *     User::find()->load('comments', [
     *         'where' => ['{@}.status' => 'public']
     *     ]);
     *
     * Please note using "{@}" column name, this placeholder is required to prevent collisions and
     * it will be automatically replaced with valid table alias of pre-loaded comments table.
     *
     *     // In case where your loaded relation is MANY_TO_MANY you can also specify pivot table
     *     // conditions, let's pre-load all approved user tags, we can use same placeholder for pivot
     *     // table alias
     *     User::find()->load('tags', [
     *          'wherePivot' => ['{@}.approved' => true]
     *     ]);
     *
     *     // In most of cases you don't need to worry about how data was loaded, using external query
     *     // or left join, however if you want to change such behaviour you can force load method
     *     // using {@see Select::SINGLE_QUERY}
     *     User::find()->load('tags', [
     *          'method'     => Select::SINGLE_QUERY,
     *          'wherePivot' => ['{@}.approved' => true]
     *     ]);
     *
     * Attention, you will not be able to correctly paginate in this case and only ORM loaders
     * support different loading types.
     *
     * You can specify multiple loaders using array as first argument.
     *
     * Example:
     *
     *     User::find()->load(['posts', 'comments', 'profile']);
     *
     * Attention, consider disabling entity map if you want to use recursive loading (i.e
     * post.tags.posts), but first think why you even need recursive relation loading.
     *
     * @see with()
     *
     * @return static<TEntity>
     */
    public function load(string|array $relation, array $options = []): self
    {
        if (\is_string($relation)) {
            $this->loader->loadRelation($relation, $options, false, true);

            return $this;
        }

        foreach ($relation as $name => $subOption) {
            if (\is_string($subOption)) {
                // array of relation names
                $this->load($subOption, $options);
            } else {
                // multiple relations or relation with addition load options
                $this->load($name, $subOption + $options);
            }
        }

        return $this;
    }

    /**
     * With method is very similar to load() one, except it will always include related data to
     * parent query using INNER JOIN, this method can be applied only to ORM loaders and relations
     * using same database as parent record.
     *
     * Method generally used to filter data based on some relation condition. Attention, with()
     * method WILL NOT load relation data, it will only make it accessible in query.
     *
     * By default joined tables will be available in query based on relation name, you can change
     * joined table alias using relation option "alias".
     *
     * Do not forget to set DISTINCT flag while including HAS_MANY and MANY_TO_MANY relations. In
     * other scenario you will not able to paginate data well.
     *
     * Examples:
     *
     *     // Find all users who have comments comments
     *     User::find()->with('comments');
     *
     *     // Find all users who have approved comments (we can use comments table alias in where statement)
     *     User::find()->with('comments')->where('comments.approved', true);
     *
     *     // Find all users who have posts which have approved comments
     *     User::find()->with('posts.comments')->where('posts_comments.approved', true);
     *
     *     // Custom join alias for post comments relation
     *     $user->with('posts.comments', [
     *         'as' => 'comments'
     *     ])->where('comments.approved', true);
     *
     *     // If you joining MANY_TO_MANY relation you will be able to use pivot table used as relation name plus "_pivot" postfix. Let's load all users with approved tags.
     *     $user->with('tags')->where('tags_pivot.approved', true);
     *
     *     // You can also use custom alias for pivot table as well
     *     User::find()->with('tags', [
     *         'pivotAlias' => 'tags_connection'
     *     ])
     *     ->where('tags_connection.approved', false);
     *
     *
     * You can safely combine with() and load() methods.
     *
     *     // Load all users with approved comments and pre-load all their comments
     *     User::find()
     *         ->with('comments')
     *         ->where('comments.approved', true)->load('comments');
     *
     * You can also use custom conditions in this case, let's find all users with approved
     * comments and pre-load such approved comments
     *
     *     User::find()
     *             ->with('comments')
     *             ->where('comments.approved', true)
     *             ->load('comments', [
     *                 'where' => ['{@}.approved' => true]
     *             ]);
     *
     * As you might notice previous construction will create 2 queries, however we can simplify
     * this construction to use already joined table as source of data for relation via "using" keyword
     *
     *     User::find()
     *         ->with('comments')
     *         ->where('comments.approved', true)
     *         ->load('comments', ['using' => 'comments']);
     *
     * You will get only one query with INNER JOIN, to better understand this example let's use
     * custom alias for comments in with() method.
     *
     *     User::find()
     *         ->with('comments', ['as' => 'commentsR'])
     *         ->where('commentsR.approved', true)
     *         ->load('comments', ['using' => 'commentsR']);
     *
     * To use with() twice on the same relation, you can use `alias` option.
     *
     *     Country::find()
     *         // Find all translations
     *         ->with('translations', [ 'as' => 'trans'])
     *         ->load('translations', ['using' => 'trans'])
     *         // Second `with` for sorting only
     *         ->with('translations', [
     *             // Alias for SQL
     *             'as' => 'transEn',
     *             // Alias for ORM to not to overwrite previous `with`
     *              'alias' => 'translations-en',
     *              'method' => JoinableLoader::LEFT_JOIN,
     *              'where' => ['locale' => 'en'],
     *          ])
     *          ->orderBy('transEn.title', 'ASC');
     *
     * @return static<TEntity>
     *
     * @see load()
     */
    public function with(string|array $relation, array $options = []): self
    {
        if (\is_string($relation)) {
            $this->loader->loadRelation($relation, $options, true, false);

            return $this;
        }

        foreach ($relation as $name => $subOption) {
            if (\is_string($subOption)) {
                //Array of relation names
                $this->with($subOption, []);
            } else {
                //Multiple relations or relation with addition load options
                $this->with($name, $subOption);
            }
        }

        return $this;
    }

    /**
     * Find one entity or return null. Method provides the ability to configure custom query parameters.
     *
     * @return TEntity|null
     */
    public function fetchOne(?array $query = null): ?object
    {
        $select = (clone $this)->where($query)->limit(1);
        $node = $select->loader->createNode();
        $select->loader->loadData($node, true);
        $data = $node->getResult();

        if (!isset($data[0])) {
            return null;
        }

        /** @var TEntity $result */
        return $this->entityFactory->make($this->loader->getTarget(), $data[0], Node::MANAGED, typecast: true);
    }

    /**
     * Fetch all records in a form of array.
     *
     * @return list<TEntity>
     */
    public function fetchAll(): iterable
    {
        return \iterator_to_array($this->getIterator(), false);
    }

    /**
     * @return Iterator<TEntity>
     */
    public function getIterator(bool $findInHeap = false): Iterator
    {
        $node = $this->loader->createNode();
        $this->loader->loadData($node, true);

        return Iterator::createWithServices(
            $this->heap,
            $this->schema,
            $this->entityFactory,
            $this->loader->getTarget(),
            $node->getResult(),
            $findInHeap,
            typecast: true,
        );
    }

    /**
     * Load data tree from database and linked loaders in a form of array.
     *
     * @return array<array-key, array<string, mixed>>
     */
    public function fetchData(bool $typecast = true): iterable
    {
        $node = $this->loader->createNode();
        $this->loader->loadData($node, false);

        if (!$typecast) {
            return $node->getResult();
        }

        $mapper = $this->mapperProvider->getMapper($this->loader->getTarget());

        return \array_map([$mapper, 'cast'], $node->getResult());
    }

    /**
     * Compiled SQL statement.
     */
    public function sqlStatement(): string
    {
        return $this->buildQuery()->sqlStatement();
    }

    public function loadSubclasses(bool $load = true): self
    {
        $this->loader->setSubclassesLoading($load);
        return $this;
    }

    /**
     * Bypassing call to primary select query.
     */
    public function __call(string $name, array $arguments): mixed
    {
        if (\in_array(\strtoupper($name), ['AVG', 'MIN', 'MAX', 'SUM', 'COUNT'])) {
            // aggregations
            return $this->builder->withQuery(
                $this->loader->buildQuery(),
            )->__call($name, $arguments);
        }

        $result = $this->builder->__call($name, $arguments);
        if ($result instanceof QueryBuilder) {
            return $this;
        }

        return $result;
    }

    /**
     * Cloning with loader tree cloning.
     *
     * @attention at this moment binded query parameters would't be cloned!
     */
    public function __clone()
    {
        $this->loader = clone $this->loader;
        $this->builder = new QueryBuilder($this->loader->getQuery(), $this->loader);
    }

    /**
     * Remove nested loaders and clean ORM link.
     */
    public function __destruct()
    {
        unset($this->loader, $this->builder);
    }

    /**
     * @param list<non-empty-string> $pk
     * @param list<array|int|object|string> $args
     *
     * @return static<TEntity>
     */
    private function buildCompositePKQuery(array $pk, array $args): self
    {
        $prepared = [];
        foreach ($args as $index => $values) {
            $values = $values instanceof Parameter ? $values->getValue() : $values;
            if (!\is_array($values)) {
                throw new \InvalidArgumentException('Composite primary key must be defined using an array.');
            }
            if (\count($pk) !== \count($values)) {
                throw new \InvalidArgumentException(
                    \sprintf('Primary key should contain %d values.', \count($pk)),
                );
            }

            $isAssoc = !\array_is_list($values);
            foreach ($values as $key => $value) {
                if ($isAssoc && !\in_array($key, $pk, true)) {
                    throw new \InvalidArgumentException(\sprintf('Primary key `%s` not found.', $key));
                }

                $key = $isAssoc ? $key : $pk[$key];
                $prepared[$index][$key] = $value;
            }
        }

        $this->__call('where', [static function (Select\QueryBuilder $q) use ($prepared): void {
            foreach ($prepared as $set) {
                $q->orWhere($set);
            }
        }]);

        return $this;
    }
}
