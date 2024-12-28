<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: centrifugo/api/v1/api.proto

namespace RoadRunner\Centrifugal\API\DTO\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>centrifugal.centrifugo.api.DeviceTopicListResult</code>
 */
class DeviceTopicListResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .centrifugal.centrifugo.api.DeviceTopic items = 1;</code>
     */
    private $items;
    /**
     * Generated from protobuf field <code>string next_cursor = 2;</code>
     */
    protected $next_cursor = '';
    /**
     * Generated from protobuf field <code>int64 total_count = 3;</code>
     */
    protected $total_count = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\RoadRunner\Centrifugal\API\DTO\V1\DeviceTopic>|\Google\Protobuf\Internal\RepeatedField $items
     *     @type string $next_cursor
     *     @type int|string $total_count
     * }
     */
    public function __construct($data = NULL) {
        \RoadRunner\Centrifugal\API\DTO\V1\GPBMetadata\Api::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .centrifugal.centrifugo.api.DeviceTopic items = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Generated from protobuf field <code>repeated .centrifugal.centrifugo.api.DeviceTopic items = 1;</code>
     * @param array<\RoadRunner\Centrifugal\API\DTO\V1\DeviceTopic>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setItems($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \RoadRunner\Centrifugal\API\DTO\V1\DeviceTopic::class);
        $this->items = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string next_cursor = 2;</code>
     * @return string
     */
    public function getNextCursor()
    {
        return $this->next_cursor;
    }

    /**
     * Generated from protobuf field <code>string next_cursor = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextCursor($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_cursor = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 total_count = 3;</code>
     * @return int|string
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }

    /**
     * Generated from protobuf field <code>int64 total_count = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTotalCount($var)
    {
        GPBUtil::checkInt64($var);
        $this->total_count = $var;

        return $this;
    }

}

