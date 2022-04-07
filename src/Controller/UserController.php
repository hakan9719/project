<?php
namespace App\Controller;

use App\Model\UserModel;
use App\Security\JWTSecurity;
use Core\Controller\DefaultController;

class UserController extends DefaultController {

  public function __construct() {
    $this->model = new UserModel;
  }
  
  public function signup (array $data) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      throw new \Exception("Invalid request method", 404);
    }

    if (!empty($this->model->findBy(["username" => $data['username']]))) {
      throw new \Exception("User with this username already exists.", 404);
    }

    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $this->model->save($data);
    self::jsonResponse("User ".$data['username']." created", 201);
  }

  public function login (array $data) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      throw new \Exception("Invalid request method", 404);
    }

    if ( !(isset($data['username']) && isset($data['password'])) ) {
      throw new \Exception("Invalid login data", 404);
    }
    
    $user = $this->model->findOneBy(["username" => $data['username']]);
    if (!$user) {
      throw new \Exception("Username incorrect or does not exist", 404);
    }
    
    if (password_verify($data['password'], $user->getPassword())) {
      $token = (new JWTSecurity)->generateToken();
      self::jsonResponse($token, 200);
    }
  }
}