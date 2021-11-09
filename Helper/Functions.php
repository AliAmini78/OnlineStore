<?php 

// prop for session 
session_abort();
session_start();


/**
 * var_dump and die function 
 *
 * @param array $var = variable for log
 * @return void
 */
function dd($var=[])
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    
    die;
}


///make  cart session 
return isset($_SESSION['cart'])?: $_SESSION['cart'] = [] ;
 







