<?php

function getSqlCondition($condition)
{
    $sqlCondition = "=";

    $rule = [
        "no" => "=",
        "is" => "=",
        "is_not" => "!=",
        "before" => "<",
        "on_or_before" => "<=",
        "after" => ">",
        "on_or_after" => ">=",
        "contain" => "LIKE",
        "does_not_contain" => "NOT LIKE",
        "start_with" => "LIKE",
        "end_with" => "LIKE",
        "does_not_start_with" => "NOT LIKE",
        "does_not_end_with" => "NOT LIKE",
    ];

    if (array_key_exists($condition, $rule)) {
        $sqlCondition = $rule[$condition];
    }

    return $sqlCondition;
}

function getSqlConditionalValue($condition, $value)
{
    $ConditionalValue = $value;

    $rule = [
        "contain" => "%" . $value . "%",
        "does_not_contain" => "%" . $value . "%",
        "start_with" => $value . "%",
        "end_with" => "%" . $value,
        "does_not_start_with" => $value . "%",
        "does_not_end_with" => "%" . $value,
        "between" => [date("Y-m-d 23:59:59"), date("Y-m-d 00:00:00", strtotime($value))],
    ];

    if (array_key_exists($condition, $rule)) {
        $ConditionalValue = $rule[$condition];
    }

    return $ConditionalValue;
}
