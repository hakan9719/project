<?php
namespace App\Entity;

use App\Model\ReservationModel;
use Core\Entity\DefaultEntity;

class Tables extends DefaultEntity {

  private int $id;
  private int $taille;
  private int|null $reservation_id;
  private bool $statut;

  public function __construct()
  {
    $this->statut = true;
    if (!is_null($this->reservation_id)) {
      if ((new ReservationModel)->find($this->reservation_id)->getStatut() === false) {
        $this->statut = false;
      }
    }
  }

  public function JsonSerialize(): array
  {
    return [
      'id' => $this->id,
      'taille' => $this->taille,
      'reservationId' => $this->reservation_id,
      'statut' => $this->statut
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