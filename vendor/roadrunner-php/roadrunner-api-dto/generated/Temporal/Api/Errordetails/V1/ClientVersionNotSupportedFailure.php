<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: temporal/api/errordetails/v1/message.proto

namespace Temporal\Api\Errordetails\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>temporal.api.errordetails.v1.ClientVersionNotSupportedFailure</code>
 */
class ClientVersionNotSupportedFailure extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string client_version = 1;</code>
     */
    protected $client_version = '';
    /**
     * Generated from protobuf field <code>string client_name = 2;</code>
     */
    protected $client_name = '';
    /**
     * Generated from protobuf field <code>string supported_versions = 3;</code>
     */
    protected $supported_versions = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $client_version
     *     @type string $client_name
     *     @type string $supported_versions
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Temporal\Api\Errordetails\V1\Message::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string client_version = 1;</code>
     * @return string
     */
    public function getClientVersion()
    {
        return $this->client_version;
    }

    /**
     * Generated from protobuf field <code>string client_version = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setClientVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->client_version = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string client_name = 2;</code>
     * @return string
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * Generated from protobuf field <code>string client_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setClientName($var)
    {
        GPBUtil::checkString($var, True);
        $this->client_name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string supported_versions = 3;</code>
     * @return string
     */
    public function getSupportedVersions()
    {
        return $this->supported_versions;
    }

    /**
     * Generated from protobuf field <code>string supported_versions = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setSupportedVersions($var)
    {
        GPBUtil::checkString($var, True);
        $this->supported_versions = $var;

        return $this;
    }

}

