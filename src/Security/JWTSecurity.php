<?php
namespace App\Security;

use Firebase\JWT\JWT;

class JWTSecurity {

  private $secret = "Ceci est un secret";
  private $algo = "HS256";

  private array $payload;

  public function generateToken (): string
  {
    // $date = new \DateTime();
    // $exp = $date->modify("+ 1 day");

    $this->payload = [
      "iss" => "nous",
      "bidule" => "Bienvenu dans nous."
    ];

    return JWT::encode($this->payload, $this->secret, $this->algo);
  }

  public function verifyToken () {
    if (isset($_COOKIE['JWT']) && !empty($_COOKIE['JWT'])) {
      
    }

  }
}