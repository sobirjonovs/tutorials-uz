<?php 

namespace App\Core;

class Router
{
    public $url;
    public function getTrack($routes, $uri)
    {
       foreach ($routes as $route) {
          $pattern = $this->createPattern($route->path);
          if (preg_match($pattern, $uri, $params)) {
               $params = $this->clearParams($params);

               return new Track($route->controller,$route->action,$params);
          }
       }
       http_response_code(404);
       return new Track('error','notFound');
    
    }
    public function createPattern($path)
    {
        return "#^". preg_replace("#/:([^/]+)#", "/(?<$1>[^/]+)", $path) . "/?$#";
    }
    public function clearParams($param)
    {
        $result = [];
        foreach ($param as $key => $value) {
            if (!is_int($key)) {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
