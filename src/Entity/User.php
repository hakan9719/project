<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

class User extends DefaultEntity {
  private $id;
  private $username;
  private $password;

  public function JsonSerialize(): array
  {
    return [
      'username' => $this->username
    ];
  }

  

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of username
   */ 
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Set the value of username
   *
   * @return  self
   */ 
  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */ 
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }
}