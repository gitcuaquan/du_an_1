<?php
function vnd($number, $suffix = 'đ'){
    return number_format($number).$suffix;
}