<?php
namespace App\Controller;

use App\Model\ReservationModel;
use App\Model\TablesModel;
use Core\Controller\DefaultController;
use JsonException;

class ReservationController extends DefaultController {

  public function __construct () {
    $this->model = new ReservationModel;
    $this->tableModel = new TablesModel;
  } 

  public function index()
  {
    self::jsonResponse($this->model->findAll(), 200);
  }

  public function single(int $id)
  {
    self::jsonResponse($this->model->find($id), 200);
  }

    /**
     * @throws JsonException
     */
    public function save(array $data)
  {
    $reservation = [
        "nom" => $data['nom'],
        "prenom" => $data['prenom'],
        "mail" => $data['mail'],
        "telephone" => $data['telephone'],
        "carte" => $data['carte']
    ];

    $lastId = $this->model->save($reservation);

    $tableReserved = json_decode($data['tables'], true, 512, JSON_THROW_ON_ERROR);
    if (!empty($tableReserved)) {
        foreach ($tableReserved as $table) {
            $table['reservation_id'] = $lastId;
            $this->tableModel->update($table['id'], $table);
        }
    }

    self::jsonResponse($this->model->find($lastId), 201);
  }

  public function update (int $id, array $data)
  {
    if($this->model->update($id, $data)) {
      self::jsonResponse($this->model->find($id), 201);
    }
  }

  public function delete (int $id)
  {
    $this->model->delete($id);
    self::jsonResponse("Delete OK", 200);
  }
}