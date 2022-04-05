<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

class LienCommande extends DefaultEntity {

  private int $id;
  private int $plat;
  private int $commande;
  private int $quantite;

  public function JsonSerialize(): array
  {
    return [
      'id' => $this->id,
      'plat' => $this->plat,
      'commande' => $this->commande,
      'quantite' => $this->quantite
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
   * Get the value of plat
   */ 
  public function getPlat()
  {
    return $this->plat;
  }

  /**
   * Set the value of plat
   *
   * @return  self
   */ 
  public function setPlat($plat)
  {
    $this->plat = $plat;

    return $this;
  }

  /**
   * Get the value of commande
   */ 
  public function getCommande()
  {
    return $this->commande;
  }

  /**
   * Set the value of commande
   *
   * @return  self
   */ 
  public function setCommande($commande)
  {
    $this->commande = $commande;

    return $this;
  }

  /**
   * Get the value of quantite
   */ 
  public function getQuantite()
  {
    return $this->quantite;
  }

  /**
   * Set the value of quantite
   *
   * @return  self
   */ 
  public function setQuantite($quantite)
  {
    $this->quantite = $quantite;

    return $this;
  }
}