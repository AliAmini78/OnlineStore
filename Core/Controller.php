<?php

//name space
namespace Core;


/**
 * main app controller 
 */
class Controller
{

    /**
     * render view and send params in it
     *
     * @param string $view = the render file name
     * @param array $params = the data for send in view
     * @return void = render page with data
     */
    public function render($view , $params =[])
    {
        return Application::$app->router->renderView($view , $params);
    }
}
