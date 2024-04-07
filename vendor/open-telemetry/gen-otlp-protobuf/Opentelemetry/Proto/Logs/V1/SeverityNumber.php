<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: opentelemetry/proto/logs/v1/logs.proto

namespace Opentelemetry\Proto\Logs\V1;

use UnexpectedValueException;

/**
 * Possible values for LogRecord.SeverityNumber.
 *
 * Protobuf type <code>opentelemetry.proto.logs.v1.SeverityNumber</code>
 */
class SeverityNumber
{
    /**
     * UNSPECIFIED is the default SeverityNumber, it MUST NOT be used.
     *
     * Generated from protobuf enum <code>SEVERITY_NUMBER_UNSPECIFIED = 0;</code>
     */
    const SEVERITY_NUMBER_UNSPECIFIED = 0;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_TRACE = 1;</code>
     */
    const SEVERITY_NUMBER_TRACE = 1;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_TRACE2 = 2;</code>
     */
    const SEVERITY_NUMBER_TRACE2 = 2;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_TRACE3 = 3;</code>
     */
    const SEVERITY_NUMBER_TRACE3 = 3;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_TRACE4 = 4;</code>
     */
    const SEVERITY_NUMBER_TRACE4 = 4;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_DEBUG = 5;</code>
     */
    const SEVERITY_NUMBER_DEBUG = 5;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_DEBUG2 = 6;</code>
     */
    const SEVERITY_NUMBER_DEBUG2 = 6;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_DEBUG3 = 7;</code>
     */
    const SEVERITY_NUMBER_DEBUG3 = 7;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_DEBUG4 = 8;</code>
     */
    const SEVERITY_NUMBER_DEBUG4 = 8;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_INFO = 9;</code>
     */
    const SEVERITY_NUMBER_INFO = 9;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_INFO2 = 10;</code>
     */
    const SEVERITY_NUMBER_INFO2 = 10;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_INFO3 = 11;</code>
     */
    const SEVERITY_NUMBER_INFO3 = 11;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_INFO4 = 12;</code>
     */
    const SEVERITY_NUMBER_INFO4 = 12;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_WARN = 13;</code>
     */
    const SEVERITY_NUMBER_WARN = 13;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_WARN2 = 14;</code>
     */
    const SEVERITY_NUMBER_WARN2 = 14;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_WARN3 = 15;</code>
     */
    const SEVERITY_NUMBER_WARN3 = 15;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_WARN4 = 16;</code>
     */
    const SEVERITY_NUMBER_WARN4 = 16;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_ERROR = 17;</code>
     */
    const SEVERITY_NUMBER_ERROR = 17;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_ERROR2 = 18;</code>
     */
    const SEVERITY_NUMBER_ERROR2 = 18;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_ERROR3 = 19;</code>
     */
    const SEVERITY_NUMBER_ERROR3 = 19;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_ERROR4 = 20;</code>
     */
    const SEVERITY_NUMBER_ERROR4 = 20;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_FATAL = 21;</code>
     */
    const SEVERITY_NUMBER_FATAL = 21;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_FATAL2 = 22;</code>
     */
    const SEVERITY_NUMBER_FATAL2 = 22;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_FATAL3 = 23;</code>
     */
    const SEVERITY_NUMBER_FATAL3 = 23;
    /**
     * Generated from protobuf enum <code>SEVERITY_NUMBER_FATAL4 = 24;</code>
     */
    const SEVERITY_NUMBER_FATAL4 = 24;

    private static $valueToName = [
        self::SEVERITY_NUMBER_UNSPECIFIED => 'SEVERITY_NUMBER_UNSPECIFIED',
        self::SEVERITY_NUMBER_TRACE => 'SEVERITY_NUMBER_TRACE',
        self::SEVERITY_NUMBER_TRACE2 => 'SEVERITY_NUMBER_TRACE2',
        self::SEVERITY_NUMBER_TRACE3 => 'SEVERITY_NUMBER_TRACE3',
        self::SEVERITY_NUMBER_TRACE4 => 'SEVERITY_NUMBER_TRACE4',
        self::SEVERITY_NUMBER_DEBUG => 'SEVERITY_NUMBER_DEBUG',
        self::SEVERITY_NUMBER_DEBUG2 => 'SEVERITY_NUMBER_DEBUG2',
        self::SEVERITY_NUMBER_DEBUG3 => 'SEVERITY_NUMBER_DEBUG3',
        self::SEVERITY_NUMBER_DEBUG4 => 'SEVERITY_NUMBER_DEBUG4',
        self::SEVERITY_NUMBER_INFO => 'SEVERITY_NUMBER_INFO',
        self::SEVERITY_NUMBER_INFO2 => 'SEVERITY_NUMBER_INFO2',
        self::SEVERITY_NUMBER_INFO3 => 'SEVERITY_NUMBER_INFO3',
        self::SEVERITY_NUMBER_INFO4 => 'SEVERITY_NUMBER_INFO4',
        self::SEVERITY_NUMBER_WARN => 'SEVERITY_NUMBER_WARN',
        self::SEVERITY_NUMBER_WARN2 => 'SEVERITY_NUMBER_WARN2',
        self::SEVERITY_NUMBER_WARN3 => 'SEVERITY_NUMBER_WARN3',
        self::SEVERITY_NUMBER_WARN4 => 'SEVERITY_NUMBER_WARN4',
        self::SEVERITY_NUMBER_ERROR => 'SEVERITY_NUMBER_ERROR',
        self::SEVERITY_NUMBER_ERROR2 => 'SEVERITY_NUMBER_ERROR2',
        self::SEVERITY_NUMBER_ERROR3 => 'SEVERITY_NUMBER_ERROR3',
        self::SEVERITY_NUMBER_ERROR4 => 'SEVERITY_NUMBER_ERROR4',
        self::SEVERITY_NUMBER_FATAL => 'SEVERITY_NUMBER_FATAL',
        self::SEVERITY_NUMBER_FATAL2 => 'SEVERITY_NUMBER_FATAL2',
        self::SEVERITY_NUMBER_FATAL3 => 'SEVERITY_NUMBER_FATAL3',
        self::SEVERITY_NUMBER_FATAL4 => 'SEVERITY_NUMBER_FATAL4',
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
