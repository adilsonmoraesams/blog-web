<?php


function convert_money_brl($var){
    return number_format(  (float) $var, 2, ',', '.');
}


function convert_money_usa($var){
    return number_format(  (float) $var, 2, '.', '');
}


