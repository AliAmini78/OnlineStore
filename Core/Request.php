<?php 

// name space
namespace Core;


/**
 * class for handle the header request
 */
class Request {

    /**
     * get path from header function
     *
     * @return void
     */
    public function getPath()
    {
        //این یادم باشه بعدا به حسابش برسم چون میتونیم برای سرور چیز دیگه بزاریم تا راحت تر به یو ار ال دلخواه برسیم 
        

        // declare the header in path variable
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        //chance path for get the url string
        $position = strpos($path, '?');

        // condition for url path without data
        if ($position === false) {

            return $path;
        }

        // return url path without data
        return substr($path, 0, $position);
    }

    /**
     * get method from header  function
     *
     * @return void
     */
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    /**
     * get value for GET & POST method from header function
     *
     * @return void = return data from user
     */
    public function getBody()
    {

        // declare body for get data from user 
        $body = [];

        // condition for GET method
        if ($this->getMethod() === 'get') {
            
            // give value to body from all data of user  
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }

        // get all data from POST method
        foreach ($_POST as $key => $value) {
            $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // return data 
        return $body;
    }

}