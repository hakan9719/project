<?php
namespace App\Security;

class ApiKey {
  protected string $key = 'test'; 

  public function verifyApiKey(string $testKey) {
      return ($testKey === $this->key);
  }
}