<?php
namespace Glize;

abstract class Application
{
  protected $httpRequest,
            $httpResponse,
            $name,
            $user;
  
  public function __construct()
  {
    $this->httpRequest = new HTTPRequest($this);
    $this->httpResponse = new HTTPResponse($this);
    
    $this->name = '';
    $this->user = new User();
  }
  
  public function getController()
  {
    $router = new \Libs\Router;
    
    $xml = new \DOMDocument;
    $xml->load(__DIR__.'/../App/'.$this->name.'/Config/routes.xml');
    
    $routes = $xml->getElementsByTagName('route');
    foreach ($routes as $route)
    {
      $vars = array();
      
      if ($route->hasAttribute('vars'))
      {
        $vars = explode(',', $route->getAttribute('vars'));
      }
      
      $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
    }
    
    try
    {
      $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
    }
    catch (\RuntimeException $e)
    {
      if ($e->getCode() == \Libs\Router::NO_ROUTE)
      {
        $this->httpResponse->redirect404();
      }
    }
    $_GET = array_merge($_GET, $matchedRoute->vars());
    
    $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
    return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
  }
  
  abstract public function run();
  
  public function httpRequest()
  {
    return $this->httpRequest;
  }
  
  public function httpResponse()
  {
    return $this->httpResponse;
  }
  
  public function name()
  {
    return $this->name;
  }
}