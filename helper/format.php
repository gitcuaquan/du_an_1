<?php
function vnd($number, $suffix = ' VNĐ'){
    return number_format($number).$suffix;
}