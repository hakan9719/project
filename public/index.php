<?php

use Core\Routeur\Routeur;

define("ROOT", dirname(__DIR__));
require_once ROOT . "/vendor/autoload.php";
Routeur::Routes();
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");
http_response_code(200);
