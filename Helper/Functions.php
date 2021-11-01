<?php 

session_abort();
session_start();

function dd($var)
{
    var_dump($var);
    die;
}
