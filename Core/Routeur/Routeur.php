<?php
namespace Core\Routeur;

use Core\Trait\JsonTrait;
use Exception;

final class Routeur {

    use JsonTrait;

    public static function Routes (){
        try {
            $path = explode("/", $_SERVER['PATH_INFO']);
            $controllerName = "App\Controller\\". ucfirst($path[3]). "Controller";

            if (class_exists($controllerName)) {
                $controller = new $controllerName();
            } else {
                throw new \Exception("Class does not exist", 404);
            }

            $param = null;
            if (isset($path[4])) {
                $param = $path[4];
            }
            
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    if ($param) {
                        if (is_numeric($param)) {
                            $controller->single($param);
                        } elseif (method_exists($controller, $param)) {
                            $controller->$param;
                        } else {
                            throw new \Exception("Invalid method in GET", 404);
                        }
                    } else {
                        $controller->index();
                    }
                    break;
                    
                case 'DELETE':
                    if ($param && is_numeric($param)) {
                        $controller->delete($param);
                    } else {
                        throw new \Exception("Invalid parameter in DELETE", 404);
                    }
                    break;
                    
                case 'POST':
                    if (!empty($_POST)) {
                        if (isset($param)) {
                            if (method_exists($controller, $param)) {
                                $controller->$param($_POST);
                            } else {
                                throw new \Exception("Invalid method in POST", 404);
                            }
                        } else {
                            $controller->save($_POST);
                        }
                    } else {
                        throw new \Exception("POST empty", 404);
                    }
                    break;
                    
                case 'PUT':
                    parse_str(file_get_contents("php://input"), $_PUT);
                    
                    if (!empty($_PUT)) {
                        if ($param && is_numeric($param)) {
                            $controller->update($param, $_PUT);
                        } else {
                            if (method_exists($controller, $param)) {
                                $controller->$param($_PUT);
                            } else {
                                throw new \Exception("Invalid method in PUT", 404);
                            }
                        }
                    } else {
                        throw new \Exception("PUT empty", 404);
                    }
                    break;
                    
                default:
                    throw new \Exception("Request invalid", 404);
                    break;
            }

        } catch (\Exception $e) {
            self::jsonResponse($e->getMessage(), $e->getCode());
        }
    }
}