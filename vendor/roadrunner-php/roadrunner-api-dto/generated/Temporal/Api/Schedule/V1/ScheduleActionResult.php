<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: temporal/api/schedule/v1/message.proto

namespace Temporal\Api\Schedule\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>temporal.api.schedule.v1.ScheduleActionResult</code>
 */
class ScheduleActionResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Time that the action was taken (according to the schedule, including jitter).
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp schedule_time = 1;</code>
     */
    protected $schedule_time = null;
    /**
     * Time that the action was taken (real time).
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp actual_time = 2;</code>
     */
    protected $actual_time = null;
    /**
     * If action was start_workflow:
     *
     * Generated from protobuf field <code>.temporal.api.common.v1.WorkflowExecution start_workflow_result = 11;</code>
     */
    protected $start_workflow_result = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\Timestamp $schedule_time
     *           Time that the action was taken (according to the schedule, including jitter).
     *     @type \Google\Protobuf\Timestamp $actual_time
     *           Time that the action was taken (real time).
     *     @type \Temporal\Api\Common\V1\WorkflowExecution $start_workflow_result
     *           If action was start_workflow:
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Temporal\Api\Schedule\V1\Message::initOnce();
        parent::__construct($data);
    }

    /**
     * Time that the action was taken (according to the schedule, including jitter).
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp schedule_time = 1;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getScheduleTime()
    {
        return $this->schedule_time;
    }

    public function hasScheduleTime()
    {
        return isset($this->schedule_time);
    }

    public function clearScheduleTime()
    {
        unset($this->schedule_time);
    }

    /**
     * Time that the action was taken (according to the schedule, including jitter).
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp schedule_time = 1;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setScheduleTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->schedule_time = $var;

        return $this;
    }

    /**
     * Time that the action was taken (real time).
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp actual_time = 2;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getActualTime()
    {
        return $this->actual_time;
    }

    public function hasActualTime()
    {
        return isset($this->actual_time);
    }

    public function clearActualTime()
    {
        unset($this->actual_time);
    }

    /**
     * Time that the action was taken (real time).
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp actual_time = 2;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setActualTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->actual_time = $var;

        return $this;
    }

    /**
     * If action was start_workflow:
     *
     * Generated from protobuf field <code>.temporal.api.common.v1.WorkflowExecution start_workflow_result = 11;</code>
     * @return \Temporal\Api\Common\V1\WorkflowExecution|null
     */
    public function getStartWorkflowResult()
    {
        return $this->start_workflow_result;
    }

    public function hasStartWorkflowResult()
    {
        return isset($this->start_workflow_result);
    }

    public function clearStartWorkflowResult()
    {
        unset($this->start_workflow_result);
    }

    /**
     * If action was start_workflow:
     *
     * Generated from protobuf field <code>.temporal.api.common.v1.WorkflowExecution start_workflow_result = 11;</code>
     * @param \Temporal\Api\Common\V1\WorkflowExecution $var
     * @return $this
     */
    public function setStartWorkflowResult($var)
    {
        GPBUtil::checkMessage($var, \Temporal\Api\Common\V1\WorkflowExecution::class);
        $this->start_workflow_result = $var;

        return $this;
    }

}

