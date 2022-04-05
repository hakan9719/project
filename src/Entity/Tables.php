<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

class Tables extends DefaultEntity {

  private int $id;
  private int $taille;
  private int|null $reservation_id;

  public function JsonSerialize(): array
  {
    return [
      'id' => $this->id,
      'taille' => $this->taille,
      'reservationId' => $this->reservation_id
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
   * Get the value of taille
   */ 
  public function getTaille()
  {
    return $this->taille;
  }

  /**
   * Set the value of taille
   *
   * @return  self
   */ 
  public function setTaille($taille)
  {
    $this->taille = $taille;

    return $this;
  }

  /**
   * Get the value of reservation_id
   */ 
  public function getReservation_id()
  {
    return $this->reservation_id;
  }

  /**
   * Set the value of reservation_id
   *
   * @return  self
   */ 
  public function setReservation_id($reservation_id)
  {
    $this->reservation_id = $reservation_id;

    return $this;
  }
}