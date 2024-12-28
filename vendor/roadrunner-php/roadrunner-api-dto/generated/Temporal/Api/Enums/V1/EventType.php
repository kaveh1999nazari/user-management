<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: temporal/api/enums/v1/event_type.proto

namespace Temporal\Api\Enums\V1;

use UnexpectedValueException;

/**
 * Whenever this list of events is changed do change the function shouldBufferEvent in mutableStateBuilder.go to make sure to do the correct event ordering
 *
 * Protobuf type <code>temporal.api.enums.v1.EventType</code>
 */
class EventType
{
    /**
     * Place holder and should never appear in a Workflow execution history
     *
     * Generated from protobuf enum <code>EVENT_TYPE_UNSPECIFIED = 0;</code>
     */
    const EVENT_TYPE_UNSPECIFIED = 0;
    /**
     * Workflow execution has been triggered/started
     * It contains Workflow execution inputs, as well as Workflow timeout configurations
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_STARTED = 1;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_STARTED = 1;
    /**
     * Workflow execution has successfully completed and contains Workflow execution results
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_COMPLETED = 2;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_COMPLETED = 2;
    /**
     * Workflow execution has unsuccessfully completed and contains the Workflow execution error
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_FAILED = 3;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_FAILED = 3;
    /**
     * Workflow execution has timed out by the Temporal Server
     * Usually due to the Workflow having not been completed within timeout settings
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_TIMED_OUT = 4;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_TIMED_OUT = 4;
    /**
     * Workflow Task has been scheduled and the SDK client should now be able to process any new history events
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_TASK_SCHEDULED = 5;</code>
     */
    const EVENT_TYPE_WORKFLOW_TASK_SCHEDULED = 5;
    /**
     * Workflow Task has started and the SDK client has picked up the Workflow Task and is processing new history events
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_TASK_STARTED = 6;</code>
     */
    const EVENT_TYPE_WORKFLOW_TASK_STARTED = 6;
    /**
     * Workflow Task has completed
     * The SDK client picked up the Workflow Task and processed new history events
     * SDK client may or may not ask the Temporal Server to do additional work, such as:
     * EVENT_TYPE_ACTIVITY_TASK_SCHEDULED
     * EVENT_TYPE_TIMER_STARTED
     * EVENT_TYPE_UPSERT_WORKFLOW_SEARCH_ATTRIBUTES
     * EVENT_TYPE_MARKER_RECORDED
     * EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_INITIATED
     * EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED
     * EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED
     * EVENT_TYPE_WORKFLOW_EXECUTION_COMPLETED
     * EVENT_TYPE_WORKFLOW_EXECUTION_FAILED
     * EVENT_TYPE_WORKFLOW_EXECUTION_CANCELED
     * EVENT_TYPE_WORKFLOW_EXECUTION_CONTINUED_AS_NEW
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_TASK_COMPLETED = 7;</code>
     */
    const EVENT_TYPE_WORKFLOW_TASK_COMPLETED = 7;
    /**
     * Workflow Task encountered a timeout
     * Either an SDK client with a local cache was not available at the time, or it took too long for the SDK client to process the task
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_TASK_TIMED_OUT = 8;</code>
     */
    const EVENT_TYPE_WORKFLOW_TASK_TIMED_OUT = 8;
    /**
     * Workflow Task encountered a failure
     * Usually this means that the Workflow was non-deterministic
     * However, the Workflow reset functionality also uses this event
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_TASK_FAILED = 9;</code>
     */
    const EVENT_TYPE_WORKFLOW_TASK_FAILED = 9;
    /**
     * Activity Task was scheduled
     * The SDK client should pick up this activity task and execute
     * This event type contains activity inputs, as well as activity timeout configurations
     *
     * Generated from protobuf enum <code>EVENT_TYPE_ACTIVITY_TASK_SCHEDULED = 10;</code>
     */
    const EVENT_TYPE_ACTIVITY_TASK_SCHEDULED = 10;
    /**
     * Activity Task has started executing
     * The SDK client has picked up the Activity Task and is processing the Activity invocation
     *
     * Generated from protobuf enum <code>EVENT_TYPE_ACTIVITY_TASK_STARTED = 11;</code>
     */
    const EVENT_TYPE_ACTIVITY_TASK_STARTED = 11;
    /**
     * Activity Task has finished successfully
     * The SDK client has picked up and successfully completed the Activity Task
     * This event type contains Activity execution results
     *
     * Generated from protobuf enum <code>EVENT_TYPE_ACTIVITY_TASK_COMPLETED = 12;</code>
     */
    const EVENT_TYPE_ACTIVITY_TASK_COMPLETED = 12;
    /**
     * Activity Task has finished unsuccessfully
     * The SDK picked up the Activity Task but unsuccessfully completed it
     * This event type contains Activity execution errors
     *
     * Generated from protobuf enum <code>EVENT_TYPE_ACTIVITY_TASK_FAILED = 13;</code>
     */
    const EVENT_TYPE_ACTIVITY_TASK_FAILED = 13;
    /**
     * Activity has timed out according to the Temporal Server
     * Activity did not complete within the timeout settings
     *
     * Generated from protobuf enum <code>EVENT_TYPE_ACTIVITY_TASK_TIMED_OUT = 14;</code>
     */
    const EVENT_TYPE_ACTIVITY_TASK_TIMED_OUT = 14;
    /**
     * A request to cancel the Activity has occurred
     * The SDK client will be able to confirm cancellation of an Activity during an Activity heartbeat
     *
     * Generated from protobuf enum <code>EVENT_TYPE_ACTIVITY_TASK_CANCEL_REQUESTED = 15;</code>
     */
    const EVENT_TYPE_ACTIVITY_TASK_CANCEL_REQUESTED = 15;
    /**
     * Activity has been cancelled
     *
     * Generated from protobuf enum <code>EVENT_TYPE_ACTIVITY_TASK_CANCELED = 16;</code>
     */
    const EVENT_TYPE_ACTIVITY_TASK_CANCELED = 16;
    /**
     * A timer has started
     *
     * Generated from protobuf enum <code>EVENT_TYPE_TIMER_STARTED = 17;</code>
     */
    const EVENT_TYPE_TIMER_STARTED = 17;
    /**
     * A timer has fired
     *
     * Generated from protobuf enum <code>EVENT_TYPE_TIMER_FIRED = 18;</code>
     */
    const EVENT_TYPE_TIMER_FIRED = 18;
    /**
     * A time has been cancelled
     *
     * Generated from protobuf enum <code>EVENT_TYPE_TIMER_CANCELED = 19;</code>
     */
    const EVENT_TYPE_TIMER_CANCELED = 19;
    /**
     * A request has been made to cancel the Workflow execution
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_CANCEL_REQUESTED = 20;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_CANCEL_REQUESTED = 20;
    /**
     * SDK client has confirmed the cancellation request and the Workflow execution has been cancelled
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_CANCELED = 21;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_CANCELED = 21;
    /**
     * Workflow has requested that the Temporal Server try to cancel another Workflow
     *
     * Generated from protobuf enum <code>EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED = 22;</code>
     */
    const EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED = 22;
    /**
     * Temporal Server could not cancel the targeted Workflow
     * This is usually because the target Workflow could not be found
     *
     * Generated from protobuf enum <code>EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_FAILED = 23;</code>
     */
    const EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_FAILED = 23;
    /**
     * Temporal Server has successfully requested the cancellation of the target Workflow
     *
     * Generated from protobuf enum <code>EVENT_TYPE_EXTERNAL_WORKFLOW_EXECUTION_CANCEL_REQUESTED = 24;</code>
     */
    const EVENT_TYPE_EXTERNAL_WORKFLOW_EXECUTION_CANCEL_REQUESTED = 24;
    /**
     * A marker has been recorded.
     * This event type is transparent to the Temporal Server
     * The Server will only store it and will not try to understand it.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_MARKER_RECORDED = 25;</code>
     */
    const EVENT_TYPE_MARKER_RECORDED = 25;
    /**
     * Workflow has received a Signal event
     * The event type contains the Signal name, as well as a Signal payload
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_SIGNALED = 26;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_SIGNALED = 26;
    /**
     * Workflow execution has been forcefully terminated
     * This is usually because the terminate Workflow API was called
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_TERMINATED = 27;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_TERMINATED = 27;
    /**
     * Workflow has successfully completed and a new Workflow has been started within the same transaction
     * Contains last Workflow execution results as well as new Workflow execution inputs
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_CONTINUED_AS_NEW = 28;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_CONTINUED_AS_NEW = 28;
    /**
     * Temporal Server will try to start a child Workflow
     *
     * Generated from protobuf enum <code>EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_INITIATED = 29;</code>
     */
    const EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_INITIATED = 29;
    /**
     * Child Workflow execution cannot be started/triggered
     * Usually due to a child Workflow ID collision
     *
     * Generated from protobuf enum <code>EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_FAILED = 30;</code>
     */
    const EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_FAILED = 30;
    /**
     * Child Workflow execution has successfully started/triggered
     *
     * Generated from protobuf enum <code>EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_STARTED = 31;</code>
     */
    const EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_STARTED = 31;
    /**
     * Child Workflow execution has successfully completed
     *
     * Generated from protobuf enum <code>EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_COMPLETED = 32;</code>
     */
    const EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_COMPLETED = 32;
    /**
     * Child Workflow execution has unsuccessfully completed
     *
     * Generated from protobuf enum <code>EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_FAILED = 33;</code>
     */
    const EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_FAILED = 33;
    /**
     * Child Workflow execution has been cancelled
     *
     * Generated from protobuf enum <code>EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_CANCELED = 34;</code>
     */
    const EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_CANCELED = 34;
    /**
     * Child Workflow execution has timed out by the Temporal Server
     *
     * Generated from protobuf enum <code>EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_TIMED_OUT = 35;</code>
     */
    const EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_TIMED_OUT = 35;
    /**
     * Child Workflow execution has been terminated
     *
     * Generated from protobuf enum <code>EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_TERMINATED = 36;</code>
     */
    const EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_TERMINATED = 36;
    /**
     * Temporal Server will try to Signal the targeted Workflow
     * Contains the Signal name, as well as a Signal payload
     *
     * Generated from protobuf enum <code>EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED = 37;</code>
     */
    const EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED = 37;
    /**
     * Temporal Server cannot Signal the targeted Workflow
     * Usually because the Workflow could not be found
     *
     * Generated from protobuf enum <code>EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_FAILED = 38;</code>
     */
    const EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_FAILED = 38;
    /**
     * Temporal Server has successfully Signaled the targeted Workflow
     *
     * Generated from protobuf enum <code>EVENT_TYPE_EXTERNAL_WORKFLOW_EXECUTION_SIGNALED = 39;</code>
     */
    const EVENT_TYPE_EXTERNAL_WORKFLOW_EXECUTION_SIGNALED = 39;
    /**
     * Workflow search attributes should be updated and synchronized with the visibility store
     *
     * Generated from protobuf enum <code>EVENT_TYPE_UPSERT_WORKFLOW_SEARCH_ATTRIBUTES = 40;</code>
     */
    const EVENT_TYPE_UPSERT_WORKFLOW_SEARCH_ATTRIBUTES = 40;
    /**
     * An update was accepted (i.e. validated)
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_ACCEPTED = 41;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_ACCEPTED = 41;
    /**
     * An update was rejected (i.e. failed validation)
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_REJECTED = 42;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_REJECTED = 42;
    /**
     * An update completed
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_COMPLETED = 43;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_COMPLETED = 43;
    /**
     * Some property or properties of the workflow as a whole have changed by non-workflow code.
     * The distinction of external vs. command-based modification is important so the SDK can
     * maintain determinism when using the command-based approach.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_PROPERTIES_MODIFIED_EXTERNALLY = 44;</code>
     */
    const EVENT_TYPE_WORKFLOW_PROPERTIES_MODIFIED_EXTERNALLY = 44;
    /**
     * Some property or properties of an already-scheduled activity have changed by non-workflow code.
     * The distinction of external vs. command-based modification is important so the SDK can
     * maintain determinism when using the command-based approach.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_ACTIVITY_PROPERTIES_MODIFIED_EXTERNALLY = 45;</code>
     */
    const EVENT_TYPE_ACTIVITY_PROPERTIES_MODIFIED_EXTERNALLY = 45;
    /**
     * Workflow properties modified by user workflow code
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_PROPERTIES_MODIFIED = 46;</code>
     */
    const EVENT_TYPE_WORKFLOW_PROPERTIES_MODIFIED = 46;
    /**
     * An update was admitted. Note that not all admitted updates result in this
     * event. See UpdateAdmittedEventOrigin for situations in which this event
     * is created.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_ADMITTED = 47;</code>
     */
    const EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_ADMITTED = 47;
    /**
     * A Nexus operation was scheduled using a ScheduleNexusOperation command.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_NEXUS_OPERATION_SCHEDULED = 48;</code>
     */
    const EVENT_TYPE_NEXUS_OPERATION_SCHEDULED = 48;
    /**
     * An asynchronous Nexus operation was started by a Nexus handler.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_NEXUS_OPERATION_STARTED = 49;</code>
     */
    const EVENT_TYPE_NEXUS_OPERATION_STARTED = 49;
    /**
     * A Nexus operation completed successfully.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_NEXUS_OPERATION_COMPLETED = 50;</code>
     */
    const EVENT_TYPE_NEXUS_OPERATION_COMPLETED = 50;
    /**
     * A Nexus operation failed.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_NEXUS_OPERATION_FAILED = 51;</code>
     */
    const EVENT_TYPE_NEXUS_OPERATION_FAILED = 51;
    /**
     * A Nexus operation completed as canceled.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_NEXUS_OPERATION_CANCELED = 52;</code>
     */
    const EVENT_TYPE_NEXUS_OPERATION_CANCELED = 52;
    /**
     * A Nexus operation timed out.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_NEXUS_OPERATION_TIMED_OUT = 53;</code>
     */
    const EVENT_TYPE_NEXUS_OPERATION_TIMED_OUT = 53;
    /**
     * A Nexus operation was requested to be canceled using a RequestCancelNexusOperation command.
     *
     * Generated from protobuf enum <code>EVENT_TYPE_NEXUS_OPERATION_CANCEL_REQUESTED = 54;</code>
     */
    const EVENT_TYPE_NEXUS_OPERATION_CANCEL_REQUESTED = 54;

    private static $valueToName = [
        self::EVENT_TYPE_UNSPECIFIED => 'EVENT_TYPE_UNSPECIFIED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_STARTED => 'EVENT_TYPE_WORKFLOW_EXECUTION_STARTED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_COMPLETED => 'EVENT_TYPE_WORKFLOW_EXECUTION_COMPLETED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_FAILED => 'EVENT_TYPE_WORKFLOW_EXECUTION_FAILED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_TIMED_OUT => 'EVENT_TYPE_WORKFLOW_EXECUTION_TIMED_OUT',
        self::EVENT_TYPE_WORKFLOW_TASK_SCHEDULED => 'EVENT_TYPE_WORKFLOW_TASK_SCHEDULED',
        self::EVENT_TYPE_WORKFLOW_TASK_STARTED => 'EVENT_TYPE_WORKFLOW_TASK_STARTED',
        self::EVENT_TYPE_WORKFLOW_TASK_COMPLETED => 'EVENT_TYPE_WORKFLOW_TASK_COMPLETED',
        self::EVENT_TYPE_WORKFLOW_TASK_TIMED_OUT => 'EVENT_TYPE_WORKFLOW_TASK_TIMED_OUT',
        self::EVENT_TYPE_WORKFLOW_TASK_FAILED => 'EVENT_TYPE_WORKFLOW_TASK_FAILED',
        self::EVENT_TYPE_ACTIVITY_TASK_SCHEDULED => 'EVENT_TYPE_ACTIVITY_TASK_SCHEDULED',
        self::EVENT_TYPE_ACTIVITY_TASK_STARTED => 'EVENT_TYPE_ACTIVITY_TASK_STARTED',
        self::EVENT_TYPE_ACTIVITY_TASK_COMPLETED => 'EVENT_TYPE_ACTIVITY_TASK_COMPLETED',
        self::EVENT_TYPE_ACTIVITY_TASK_FAILED => 'EVENT_TYPE_ACTIVITY_TASK_FAILED',
        self::EVENT_TYPE_ACTIVITY_TASK_TIMED_OUT => 'EVENT_TYPE_ACTIVITY_TASK_TIMED_OUT',
        self::EVENT_TYPE_ACTIVITY_TASK_CANCEL_REQUESTED => 'EVENT_TYPE_ACTIVITY_TASK_CANCEL_REQUESTED',
        self::EVENT_TYPE_ACTIVITY_TASK_CANCELED => 'EVENT_TYPE_ACTIVITY_TASK_CANCELED',
        self::EVENT_TYPE_TIMER_STARTED => 'EVENT_TYPE_TIMER_STARTED',
        self::EVENT_TYPE_TIMER_FIRED => 'EVENT_TYPE_TIMER_FIRED',
        self::EVENT_TYPE_TIMER_CANCELED => 'EVENT_TYPE_TIMER_CANCELED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_CANCEL_REQUESTED => 'EVENT_TYPE_WORKFLOW_EXECUTION_CANCEL_REQUESTED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_CANCELED => 'EVENT_TYPE_WORKFLOW_EXECUTION_CANCELED',
        self::EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED => 'EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED',
        self::EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_FAILED => 'EVENT_TYPE_REQUEST_CANCEL_EXTERNAL_WORKFLOW_EXECUTION_FAILED',
        self::EVENT_TYPE_EXTERNAL_WORKFLOW_EXECUTION_CANCEL_REQUESTED => 'EVENT_TYPE_EXTERNAL_WORKFLOW_EXECUTION_CANCEL_REQUESTED',
        self::EVENT_TYPE_MARKER_RECORDED => 'EVENT_TYPE_MARKER_RECORDED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_SIGNALED => 'EVENT_TYPE_WORKFLOW_EXECUTION_SIGNALED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_TERMINATED => 'EVENT_TYPE_WORKFLOW_EXECUTION_TERMINATED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_CONTINUED_AS_NEW => 'EVENT_TYPE_WORKFLOW_EXECUTION_CONTINUED_AS_NEW',
        self::EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_INITIATED => 'EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_INITIATED',
        self::EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_FAILED => 'EVENT_TYPE_START_CHILD_WORKFLOW_EXECUTION_FAILED',
        self::EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_STARTED => 'EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_STARTED',
        self::EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_COMPLETED => 'EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_COMPLETED',
        self::EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_FAILED => 'EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_FAILED',
        self::EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_CANCELED => 'EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_CANCELED',
        self::EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_TIMED_OUT => 'EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_TIMED_OUT',
        self::EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_TERMINATED => 'EVENT_TYPE_CHILD_WORKFLOW_EXECUTION_TERMINATED',
        self::EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED => 'EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_INITIATED',
        self::EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_FAILED => 'EVENT_TYPE_SIGNAL_EXTERNAL_WORKFLOW_EXECUTION_FAILED',
        self::EVENT_TYPE_EXTERNAL_WORKFLOW_EXECUTION_SIGNALED => 'EVENT_TYPE_EXTERNAL_WORKFLOW_EXECUTION_SIGNALED',
        self::EVENT_TYPE_UPSERT_WORKFLOW_SEARCH_ATTRIBUTES => 'EVENT_TYPE_UPSERT_WORKFLOW_SEARCH_ATTRIBUTES',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_ACCEPTED => 'EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_ACCEPTED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_REJECTED => 'EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_REJECTED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_COMPLETED => 'EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_COMPLETED',
        self::EVENT_TYPE_WORKFLOW_PROPERTIES_MODIFIED_EXTERNALLY => 'EVENT_TYPE_WORKFLOW_PROPERTIES_MODIFIED_EXTERNALLY',
        self::EVENT_TYPE_ACTIVITY_PROPERTIES_MODIFIED_EXTERNALLY => 'EVENT_TYPE_ACTIVITY_PROPERTIES_MODIFIED_EXTERNALLY',
        self::EVENT_TYPE_WORKFLOW_PROPERTIES_MODIFIED => 'EVENT_TYPE_WORKFLOW_PROPERTIES_MODIFIED',
        self::EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_ADMITTED => 'EVENT_TYPE_WORKFLOW_EXECUTION_UPDATE_ADMITTED',
        self::EVENT_TYPE_NEXUS_OPERATION_SCHEDULED => 'EVENT_TYPE_NEXUS_OPERATION_SCHEDULED',
        self::EVENT_TYPE_NEXUS_OPERATION_STARTED => 'EVENT_TYPE_NEXUS_OPERATION_STARTED',
        self::EVENT_TYPE_NEXUS_OPERATION_COMPLETED => 'EVENT_TYPE_NEXUS_OPERATION_COMPLETED',
        self::EVENT_TYPE_NEXUS_OPERATION_FAILED => 'EVENT_TYPE_NEXUS_OPERATION_FAILED',
        self::EVENT_TYPE_NEXUS_OPERATION_CANCELED => 'EVENT_TYPE_NEXUS_OPERATION_CANCELED',
        self::EVENT_TYPE_NEXUS_OPERATION_TIMED_OUT => 'EVENT_TYPE_NEXUS_OPERATION_TIMED_OUT',
        self::EVENT_TYPE_NEXUS_OPERATION_CANCEL_REQUESTED => 'EVENT_TYPE_NEXUS_OPERATION_CANCEL_REQUESTED',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}
