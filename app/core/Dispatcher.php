<?php 

namespace App\Core;

class Dispatcher
{
    public function getPage(Track $track)
    {
        $className = ucfirst($track->controller) . "Controller";
        $fullName = "\\app\\controllers\\{$className}";

        try {
            $controller = new $fullName;
            $methodName = $track->action;
            if(method_exists($controller, $methodName))
            {
                $result = $controller->{$methodName}($track->params);
                if ($result) {
                    return $result;
                } else {
                    return new Page('default');
                }
            }else {
               echo "Metod page topilmadi";
            }
        } catch (\Exception $error) {
            echo $error->getMessage(); die();
        }
    }
}
