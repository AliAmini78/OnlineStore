<?php 


// name space
namespace Core;


/**
 * class for manage the page response 
 */
class Response{

    /**
     * set request status code function
     *
     * @param integer $code = status code
     * @return void
     */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}