<?php

use database\Database;


function is_phone($phone){
    $pattern = '/(\+?98|098|0|0098)?(9\d{9})/';	
    return preg_match($pattern, $phone) ? true : false;
} 