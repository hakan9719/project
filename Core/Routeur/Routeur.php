<?php
namespace Core\Routeur;

use Core\Trait\JsonTrait;

final class Routeur {

    use JsonTrait;

    public static function Routes (){
        try {
            $path = explode("/", $_SERVER['PATH_INFO']);
            $controllerName = "App\Controller\\". ucfirst($path[3]). "Controller";
            $controller = new $controllerName();
            $param = null;
            if (isset($path[4])) {
                if (is_numeric($path[4])) {
                    $method = "single";
                    $param = $path[4];
                } elseif (method_exists($controller, $path[4])) {
                    $method = $path[4];
                } else {
                    throw new \Exception("Méthode inexistante", 404);
                }
            } else {
                $method = "index";
            }

            $controller->$method($param);

        } catch (\Exception $e) {
            self::jsonResponse($e->getMessage(), $e->getCode());
        }
    }
}