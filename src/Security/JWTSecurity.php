<?php
namespace App\Security;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTSecurity {

  private $secret = "Ceci est un secret";
  private $algo = "HS256";
  private $skipToken = true;

  private array $payload = [
      "iss" => "nous",
      "exp" => 0,
      "bidule" => "Bienvenu dans nous."
    ];

  public function generateToken (): string
  {
    $this->payload['exp'] = time() + (24*60*60);
    return JWT::encode($this->payload, $this->secret, $this->algo);
  }

  public function verifyToken () {
    if ($this->skipToken) {
      return true;
    }

    if ( !isset($_COOKIE['JWT']) || empty($_COOKIE['JWT'])) {
      return false;
    }

    $token = $_COOKIE['JWT'];
    $decode = JWT::decode($token, new Key($this->secret, $this->algo));

    if (!(
      isset($decode->iss) && isset($decode->exp) && isset($decode->bidule)
    )) {
      return false;
    }

    if (
      $decode->iss == $this->payload['iss'] &&
      $decode->exp > time() &&
      $decode->bidule == $this->payload['bidule']
      ) {
      return true;
    }

    return false;
  }
}