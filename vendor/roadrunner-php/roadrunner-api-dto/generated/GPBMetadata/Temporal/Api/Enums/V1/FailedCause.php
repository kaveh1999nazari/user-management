<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: temporal/api/enums/v1/failed_cause.proto

namespace GPBMetadata\Temporal\Api\Enums\V1;

class FailedCause
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            "\x0A\xCE\x1E\x0A(temporal/api/enums/v1/failed_cause.proto\x12\x15temporal.api.enums.v1*\xEE\x11\x0A\x17WorkflowTaskFailedCause\x12*\x0A&WORKFLOW_TASK_FAILED_CAUSE_UNSPECIFIED\x10\x00\x120\x0A,WORKFLOW_TASK_FAILED_CAUSE_UNHANDLED_COMMAND\x10\x01\x12?\x0A;WORKFLOW_TASK_FAILED_CAUSE_BAD_SCHEDULE_ACTIVITY_ATTRIBUTES\x10\x02\x12E\x0AAWORKFLOW_TASK_FAILED_CAUSE_BAD_REQUEST_CANCEL_ACTIVITY_ATTRIBUTES\x10\x03\x129\x0A5WORKFLOW_TASK_FAILED_CAUSE_BAD_START_TIMER_ATTRIBUTES\x10\x04\x12:\x0A6WORKFLOW_TASK_FAILED_CAUSE_BAD_CANCEL_TIMER_ATTRIBUTES\x10\x05\x12;\x0A7WORKFLOW_TASK_FAILED_CAUSE_BAD_RECORD_MARKER_ATTRIBUTES\x10\x06\x12I\x0AEWORKFLOW_TASK_FAILED_CAUSE_BAD_COMPLETE_WORKFLOW_EXECUTION_ATTRIBUTES\x10\x07\x12E\x0AAWORKFLOW_TASK_FAILED_CAUSE_BAD_FAIL_WORKFLOW_EXECUTION_ATTRIBUTES\x10\x08\x12G\x0ACWORKFLOW_TASK_FAILED_CAUSE_BAD_CANCEL_WORKFLOW_EXECUTION_ATTRIBUTES\x10\x09\x12X\x0ATWORKFLOW_TASK_FAILED_CAUSE_BAD_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_ATTRIBUTES\x10\x0A\x12=\x0A9WORKFLOW_TASK_FAILED_CAUSE_BAD_CONTINUE_AS_NEW_ATTRIBUTES\x10\x0B\x127\x0A3WORKFLOW_TASK_FAILED_CAUSE_START_TIMER_DUPLICATE_ID\x10\x0C\x126\x0A2WORKFLOW_TASK_FAILED_CAUSE_RESET_STICKY_TASK_QUEUE\x10\x0D\x12@\x0A<WORKFLOW_TASK_FAILED_CAUSE_WORKFLOW_WORKER_UNHANDLED_FAILURE\x10\x0E\x12G\x0ACWORKFLOW_TASK_FAILED_CAUSE_BAD_SIGNAL_WORKFLOW_EXECUTION_ATTRIBUTES\x10\x0F\x12C\x0A?WORKFLOW_TASK_FAILED_CAUSE_BAD_START_CHILD_EXECUTION_ATTRIBUTES\x10\x10\x122\x0A.WORKFLOW_TASK_FAILED_CAUSE_FORCE_CLOSE_COMMAND\x10\x11\x125\x0A1WORKFLOW_TASK_FAILED_CAUSE_FAILOVER_CLOSE_COMMAND\x10\x12\x124\x0A0WORKFLOW_TASK_FAILED_CAUSE_BAD_SIGNAL_INPUT_SIZE\x10\x13\x12-\x0A)WORKFLOW_TASK_FAILED_CAUSE_RESET_WORKFLOW\x10\x14\x12)\x0A%WORKFLOW_TASK_FAILED_CAUSE_BAD_BINARY\x10\x15\x12=\x0A9WORKFLOW_TASK_FAILED_CAUSE_SCHEDULE_ACTIVITY_DUPLICATE_ID\x10\x16\x124\x0A0WORKFLOW_TASK_FAILED_CAUSE_BAD_SEARCH_ATTRIBUTES\x10\x17\x126\x0A2WORKFLOW_TASK_FAILED_CAUSE_NON_DETERMINISTIC_ERROR\x10\x18\x12H\x0ADWORKFLOW_TASK_FAILED_CAUSE_BAD_MODIFY_WORKFLOW_PROPERTIES_ATTRIBUTES\x10\x19\x12E\x0AAWORKFLOW_TASK_FAILED_CAUSE_PENDING_CHILD_WORKFLOWS_LIMIT_EXCEEDED\x10\x1A\x12@\x0A<WORKFLOW_TASK_FAILED_CAUSE_PENDING_ACTIVITIES_LIMIT_EXCEEDED\x10\x1B\x12=\x0A9WORKFLOW_TASK_FAILED_CAUSE_PENDING_SIGNALS_LIMIT_EXCEEDED\x10\x1C\x12D\x0A@WORKFLOW_TASK_FAILED_CAUSE_PENDING_REQUEST_CANCEL_LIMIT_EXCEEDED\x10\x1D\x12D\x0A@WORKFLOW_TASK_FAILED_CAUSE_BAD_UPDATE_WORKFLOW_EXECUTION_MESSAGE\x10\x1E\x12/\x0A+WORKFLOW_TASK_FAILED_CAUSE_UNHANDLED_UPDATE\x10\x1F\x12F\x0ABWORKFLOW_TASK_FAILED_CAUSE_BAD_SCHEDULE_NEXUS_OPERATION_ATTRIBUTES\x10 \x12F\x0ABWORKFLOW_TASK_FAILED_CAUSE_PENDING_NEXUS_OPERATIONS_LIMIT_EXCEEDED\x10!\x12L\x0AHWORKFLOW_TASK_FAILED_CAUSE_BAD_REQUEST_CANCEL_NEXUS_OPERATION_ATTRIBUTES\x10\"\x12/\x0A+WORKFLOW_TASK_FAILED_CAUSE_FEATURE_DISABLED\x10#*\xF3\x01\x0A&StartChildWorkflowExecutionFailedCause\x12;\x0A7START_CHILD_WORKFLOW_EXECUTION_FAILED_CAUSE_UNSPECIFIED\x10\x00\x12G\x0ACSTART_CHILD_WORKFLOW_EXECUTION_FAILED_CAUSE_WORKFLOW_ALREADY_EXISTS\x10\x01\x12C\x0A?START_CHILD_WORKFLOW_EXECUTION_FAILED_CAUSE_NAMESPACE_NOT_FOUND\x10\x02*\x91\x02\x0A*CancelExternalWorkflowExecutionFailedCause\x12?\x0A;CANCEL_EXTERNAL_WORKFLOW_EXECUTION_FAILED_CAUSE_UNSPECIFIED\x10\x00\x12Y\x0AUCANCEL_EXTERNAL_WORKFLOW_EXECUTION_FAILED_CAUSE_EXTERNAL_WORKFLOW_EXECUTION_NOT_FOUND\x10\x01\x12G\x0ACCANCEL_EXTERNAL_WORKFLOW_EXECUTION_FAILED_CAUSE_NAMESPACE_NOT_FOUND\x10\x02*\xE2\x02\x0A*SignalExternalWorkflowExecutionFailedCause\x12?\x0A;SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_FAILED_CAUSE_UNSPECIFIED\x10\x00\x12Y\x0AUSIGNAL_EXTERNAL_WORKFLOW_EXECUTION_FAILED_CAUSE_EXTERNAL_WORKFLOW_EXECUTION_NOT_FOUND\x10\x01\x12G\x0ACSIGNAL_EXTERNAL_WORKFLOW_EXECUTION_FAILED_CAUSE_NAMESPACE_NOT_FOUND\x10\x02\x12O\x0AKSIGNAL_EXTERNAL_WORKFLOW_EXECUTION_FAILED_CAUSE_SIGNAL_COUNT_LIMIT_EXCEEDED\x10\x03*\x85\x03\x0A\x16ResourceExhaustedCause\x12(\x0A\$RESOURCE_EXHAUSTED_CAUSE_UNSPECIFIED\x10\x00\x12&\x0A\"RESOURCE_EXHAUSTED_CAUSE_RPS_LIMIT\x10\x01\x12-\x0A)RESOURCE_EXHAUSTED_CAUSE_CONCURRENT_LIMIT\x10\x02\x12.\x0A*RESOURCE_EXHAUSTED_CAUSE_SYSTEM_OVERLOADED\x10\x03\x12.\x0A*RESOURCE_EXHAUSTED_CAUSE_PERSISTENCE_LIMIT\x10\x04\x12*\x0A&RESOURCE_EXHAUSTED_CAUSE_BUSY_WORKFLOW\x10\x05\x12&\x0A\"RESOURCE_EXHAUSTED_CAUSE_APS_LIMIT\x10\x06\x126\x0A2RESOURCE_EXHAUSTED_CAUSE_PERSISTENCE_STORAGE_LIMIT\x10\x07*\x8F\x01\x0A\x16ResourceExhaustedScope\x12(\x0A\$RESOURCE_EXHAUSTED_SCOPE_UNSPECIFIED\x10\x00\x12&\x0A\"RESOURCE_EXHAUSTED_SCOPE_NAMESPACE\x10\x01\x12#\x0A\x1FRESOURCE_EXHAUSTED_SCOPE_SYSTEM\x10\x02B\x88\x01\x0A\x18io.temporal.api.enums.v1B\x10FailedCauseProtoP\x01Z!go.temporal.io/api/enums/v1;enums\xAA\x02\x17Temporalio.Api.Enums.V1\xEA\x02\x1ATemporalio::Api::Enums::V1b\x06proto3"
        , true);

        static::$is_initialized = true;
    }
}

