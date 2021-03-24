<?php

function fescape_string($vcparam) {
    $vcparam = trim($vcparam);
    $vcparam.=""; //Parse String;
    $len = strlen($vcparam);
    $escapeCount = 0;
    $targetString = '';
    for ($offset = 0; $offset < $len; $offset++) {
        switch ($c = $vcparam{$offset}) {
            case "'":
                // Escapes this quote only if its not preceded by an unescaped backslash
                if ($escapeCount % 2 == 0)
                    $targetString.="\\";
                $escapeCount = 0;
                $targetString.=$c;
                break;
            case '"':
                // Escapes this quote only if its not preceded by an unescaped backslash
                if ($escapeCount % 2 == 0)
                    $targetString.="\\";
                $escapeCount = 0;
                $targetString.=$c;
                break;
            case '\\':
                if ($escapeCount % 2 == 0)
                    $targetString.="\\";
                $escapeCount = 0;
                $targetString.=$c;
                /*
                  $escapeCount++;
                  $targetString.=$c;
                 */
                break;
            default:
                $escapeCount = 0;
                $targetString.=$c;
        }
    }
    return $targetString;
}

?>