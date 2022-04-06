<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

class Plat extends DefaultEntity {

  private int $id;
  private string $nom;
  private int $prix;
  private string|null $image;

  public function JsonSerialize(): array
  {
    return [
      'id' => $this->id,
      'nom' => $this->nom,
      'prix' => $this->prix,
      'image' => $this->image
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
   * Get the value of nom
   */ 
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */ 
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }

  /**
   * Get the value of prix
   */ 
  public function getPrix()
  {
    return $this->prix;
  }

  /**
   * Set the value of prix
   *
   * @return  self
   */ 
  public function setPrix($prix)
  {
    $this->prix = $prix;

    return $this;
  }
}