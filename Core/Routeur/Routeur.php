<?php
namespace Core\Routeur;

use App\Security\ApiKey;
use App\Security\JWTSecurity;
use Core\Controller\DefaultController;
use Core\Trait\JsonTrait;

final class Routeur {

    use JsonTrait;

    public static function Routes (){
        try {
            $path = explode("/", $_SERVER['PATH_INFO']);

            if (isset($path[1])) {
                if ($path[1] !== 'v0') {
                    throw new \Exception("Invalid version", 404);
                }
            } else {
                throw new \Exception("Invalid URI", 404);
            }

            if (isset($path[2])) {
                if (!(new ApiKey)->verifyApiKey($path[2])) {
                    throw new \Exception("Invalid API Key", 401);
                }
            } else {
                throw new \Exception("API Key missing", 401);
            }

            $token = (new JWTSecurity)->verifyToken();

            if (!isset($path[3])) {
                throw new \Exception("Controller missing", 404);
            }

            $controllerName = "App\Controller\\". ucfirst($path[3]). "Controller";

            if (class_exists($controllerName)) {
                $controller = new $controllerName();
            } else {
                throw new \Exception("Class does not exist", 404);
            }

            $param = null;
            if (isset($path[4])) {
                $param = $path[4];
                $defaultController = new DefaultController();
                if (!is_numeric($param) && method_exists($defaultController, $param)) {
                    throw new \Exception("Default method cannot be called mannualy", 404);
                }
            }
            
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    if ($param) {
                        if (is_numeric($param)) {
                            if ($token) {
                                $controller->single($param);
                            } else {
                                throw new \Exception("Invalid token", 404);
                            }
                        } elseif (method_exists($controller, $param)) {
                            $controller->$param();
                        } else {
                            throw new \Exception("Invalid method in GET", 404);
                        }
                    } else {
                        if ($token) {
                            $controller->index();
                        } else {
                            throw new \Exception("Invalid token", 404);
                        }
                    }
                    break;
                    
                case 'DELETE':
                    if ($param && is_numeric($param)) {
                        if ($token) {
                            $controller->delete($param);
                        } else {
                            throw new \Exception("Invalid token", 404);
                        }
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
                            if ($token) {
                                $controller->save($_POST);
                            } else {
                                throw new \Exception("Invalid token", 404);
                            }
                        }
                    } else {
                        throw new \Exception("POST empty", 404);
                    }
                    break;
                    
                case 'PUT':
                    parse_str(file_get_contents("php://input"), $_PUT);
                    
                    if (!empty($_PUT)) {
                        if ($param && is_numeric($param)) {
                            if ($token) {
                                $controller->update($param, $_PUT);
                            } else {
                                throw new \Exception("Invalid token", 404);
                            }
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
            self::jsonResponse($e->getMessage(), 404);
        }
    }
}