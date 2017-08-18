<?php

function printIfIsset($obj, $getting) {
    if(isset($obj)) {
        return $obj{$getting};
    }
    return null;
}
