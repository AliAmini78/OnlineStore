<?php
//name space
namespace Core;


/**
 * class for manage routes 
 */
class Router
{

    // instance Request class
    public Request $request;

    // instance Response class
    public Response $response;

    // variables for get all routes in app  
    protected array $routes = [];


    /**
     * the class construct 
     *
     * @param Request $request = instance of request class
     * @param Response $ = instance of response class
     */
    public function __construct(Request $request , Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    /**
     * declare url in GET method function
     *
     * @param string $path = url 
     * @param [type] $callback = functions and properties
     * @return void
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }


    /**
     * declare url in POST method function
     *
     * @param string $path = url 
     * @param [type] $callback = functions and properties
     * @return void
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }


    /**
     * set app variables function
     *
     * @return void
     */
    public function resolve()
    {
        // get header url path
        $path = $this->request->getPath();
        
        // get the url method
        $method = $this->request->getMethod();
        
        // set  url path and method  in routes
        $callback = $this->routes[$method][$path] ?? false;

        // condition for 404 page || page not found
        if (!$callback) {
            $this->response->setStatusCode(404);
            echo "Not Found";
            die;
        }

        // condition for view without function or properties
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        // return the exact result of url request
        return call_user_func($callback , $this->request);
    }



    /**
     * render the view function
     *
     * @param string $view = name of view file for rendering
     * @param array $params = parameters for send in view
     * @return void = return view with parameters
     */
    public function renderView($view , $params = [])
    {
        foreach($params as $key=>$value ){
            $$key = $value;
           
        }
        
        include_once "../App/View/{$view}.php";
    }


    /**
     * render view without params function
     *
     * @param [string] $content = view for render
     * @return void = return view without params
     */
    public function renderContent($content)
    {
        include_once "../App/View/{$view}.php";
    }


}
