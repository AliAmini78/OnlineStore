<?php 
// name space
namespace Core;



/**
 * main app class for run and setting
 */
class Application  
{
    // instance Router class 
    public Router $router;

    // instance Request class 
    public Request $request;

    // instance Response class 
    public Response $response;

    // instance self class Application 
    public static Application $app;


    /**
     * the class construct
     */
    public function __construct()
    {
        self::$app = $this;
        
        $this->request = new Request();

        $this->response = new Response();
        
        $this->router = new Router($this->request,$this->response);
    }


    /**
     * run the app function
     *
     * @return void
     */
    public function run()
    {
        $this->router->resolve();
    }
    
}
