<?php
namespace App\Entity;

use App\Model\TablesModel;
use Core\Entity\DefaultEntity;

class Reservation extends DefaultEntity {

  private int $id;
  private string $nom;
  private string $prenom;
  private string $telephone;
  private string $mail;
  private string $carte;
  private bool $statut;

  public function JsonSerialize(): array
  {
    return [
      'id' => $this->id,
      'nom' => $this->nom,
      'prenom' => $this->prenom,
      'telephone' => $this->telephone,
      'mail' => $this->mail,
      'carte' => $this->carte,
      'statut' => $this->statut,
      'tables' => $this->getTables()
    ];
  }

  public function getTables() {
    return (new TablesModel)->findBy(["reservation_id" => $this->id]);
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
   * Get the value of prenom
   */ 
  public function getPrenom()
  {
    return $this->prenom;
  }

  /**
   * Set the value of prenom
   *
   * @return  self
   */ 
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;

    return $this;
  }

  /**
   * Get the value of telephone
   */ 
  public function getTelephone()
  {
    return $this->telephone;
  }

  /**
   * Set the value of telephone
   *
   * @return  self
   */ 
  public function setTelephone($telephone)
  {
    $this->telephone = $telephone;

    return $this;
  }

  /**
   * Get the value of mail
   */ 
  public function getMail()
  {
    return $this->mail;
  }

  /**
   * Set the value of mail
   *
   * @return  self
   */ 
  public function setMail($mail)
  {
    $this->mail = $mail;

    return $this;
  }

  /**
   * Get the value of carte
   */ 
  public function getCarte()
  {
    return $this->carte;
  }

  /**
   * Set the value of carte
   *
   * @return  self
   */ 
  public function setCarte($carte)
  {
    $this->carte = $carte;

    return $this;
  }

  /**
   * Get the value of statut
   */ 
  public function getStatut()
  {
    return $this->statut;
  }

  /**
   * Set the value of statut
   *
   * @return  self
   */ 
  public function setStatut($statut)
  {
    $this->statut = $statut;

    return $this;
  }
}