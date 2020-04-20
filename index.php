<?php

function expressionChecker($expression)
{
    $valid = true;
    $stack = new SplStack();
    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];
        switch ($char) {
            case '(':
            case '{':
            case '[':
                $stack->push($char);
                break;
            case ')':
            case '}':
            case ']':
                if ($stack->isEmpty()) {
                    $valid = false;
                } else {
                    $last = $stack->pop();
                    if (($char == ")" && $last != "(")
                        || ($char == "}" && $last != "{")
                        || ($char == "]" && $last != "[")) {
                        $valid = false;
                    }
                }
                break;
        }
        if (!$valid) {
            break;
        }
    }

    //trường hợp chỉ có các dấu mở ngoặc
    if (!$stack->isEmpty()) {
        $valid = false;
    }
    return $valid;
}
