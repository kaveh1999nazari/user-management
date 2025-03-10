<?php

declare(strict_types=1);

namespace Cycle\Schema\Relation\Morphed;

use Cycle\ORM\Relation;
use Cycle\Schema\Registry;
use Cycle\Schema\Relation\RelationSchema;
use Cycle\Schema\Relation\Traits\FieldTrait;
use Cycle\Schema\Relation\Traits\MorphTrait;

final class MorphedHasMany extends RelationSchema
{
    use FieldTrait;
    use MorphTrait;

    // internal relation type
    protected const RELATION_TYPE = Relation::MORPHED_HAS_MANY;

    // relation schema options
    protected const RELATION_SCHEMA = [
        // save with parent
        Relation::CASCADE => true,

        // do not pre-load relation by default
        Relation::LOAD => Relation::LOAD_PROMISE,

        // nullable by default
        Relation::NULLABLE => true,

        // default field name for inner key
        Relation::OUTER_KEY => '{relation}_{source:primaryKey}',

        // link to parent entity primary key by default
        Relation::INNER_KEY => '{source:primaryKey}',

        // link to parent entity primary key by default
        Relation::MORPH_KEY => '{relation}_role',

        // default collection.
        Relation::COLLECTION_TYPE => null,

        // rendering options
        RelationSchema::INDEX_CREATE => true,
        RelationSchema::MORPH_KEY_LENGTH => 32,
    ];

    public function compute(Registry $registry): void
    {
        parent::compute($registry);

        $source = $registry->getEntity($this->source);
        $target = $registry->getEntity($this->target);

        // create target outer field
        $this->createRelatedFields(
            $source,
            Relation::INNER_KEY,
            $target,
            Relation::OUTER_KEY,
        );

        // create target outer field
        $this->ensureMorphField(
            $target,
            $this->options->get(Relation::MORPH_KEY),
            $this->options->get(RelationSchema::MORPH_KEY_LENGTH),
            $this->options->get(Relation::NULLABLE),
        );
    }

    public function render(Registry $registry): void
    {
        $target = $registry->getEntity($this->target);
        $outerFields = $this->getFields($target, Relation::OUTER_KEY);
        $morphFields = $this->getFields($target, Relation::MORPH_KEY);

        $this->mergeIndex($registry, $target, $outerFields, $morphFields);
    }
}
