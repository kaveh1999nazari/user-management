<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: temporal/api/query/v1/message.proto

namespace Temporal\Api\Query\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Answer to a `WorkflowQuery`
 *
 * Generated from protobuf message <code>temporal.api.query.v1.WorkflowQueryResult</code>
 */
class WorkflowQueryResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Did the query succeed or fail?
     *
     * Generated from protobuf field <code>.temporal.api.enums.v1.QueryResultType result_type = 1;</code>
     */
    protected $result_type = 0;
    /**
     * Set when the query succeeds with the results
     *
     * Generated from protobuf field <code>.temporal.api.common.v1.Payloads answer = 2;</code>
     */
    protected $answer = null;
    /**
     * Mutually exclusive with `answer`. Set when the query fails.
     *
     * Generated from protobuf field <code>string error_message = 3;</code>
     */
    protected $error_message = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $result_type
     *           Did the query succeed or fail?
     *     @type \Temporal\Api\Common\V1\Payloads $answer
     *           Set when the query succeeds with the results
     *     @type string $error_message
     *           Mutually exclusive with `answer`. Set when the query fails.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Temporal\Api\Query\V1\Message::initOnce();
        parent::__construct($data);
    }

    /**
     * Did the query succeed or fail?
     *
     * Generated from protobuf field <code>.temporal.api.enums.v1.QueryResultType result_type = 1;</code>
     * @return int
     */
    public function getResultType()
    {
        return $this->result_type;
    }

    /**
     * Did the query succeed or fail?
     *
     * Generated from protobuf field <code>.temporal.api.enums.v1.QueryResultType result_type = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setResultType($var)
    {
        GPBUtil::checkEnum($var, \Temporal\Api\Enums\V1\QueryResultType::class);
        $this->result_type = $var;

        return $this;
    }

    /**
     * Set when the query succeeds with the results
     *
     * Generated from protobuf field <code>.temporal.api.common.v1.Payloads answer = 2;</code>
     * @return \Temporal\Api\Common\V1\Payloads|null
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    public function hasAnswer()
    {
        return isset($this->answer);
    }

    public function clearAnswer()
    {
        unset($this->answer);
    }

    /**
     * Set when the query succeeds with the results
     *
     * Generated from protobuf field <code>.temporal.api.common.v1.Payloads answer = 2;</code>
     * @param \Temporal\Api\Common\V1\Payloads $var
     * @return $this
     */
    public function setAnswer($var)
    {
        GPBUtil::checkMessage($var, \Temporal\Api\Common\V1\Payloads::class);
        $this->answer = $var;

        return $this;
    }

    /**
     * Mutually exclusive with `answer`. Set when the query fails.
     *
     * Generated from protobuf field <code>string error_message = 3;</code>
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * Mutually exclusive with `answer`. Set when the query fails.
     *
     * Generated from protobuf field <code>string error_message = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setErrorMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->error_message = $var;

        return $this;
    }

}

