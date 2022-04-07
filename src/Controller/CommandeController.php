<?php
namespace App\Controller;

use App\Model\CommandeModel;
use App\Model\LienCommandeModel;
use Core\Controller\DefaultController;

class CommandeController extends DefaultController {

  public function __construct () {
    $this->model = new CommandeModel;
  } 

  public function index()
  {
    self::jsonResponse($this->model->findAll(), 200);
  }

  public function single(int $id)
  {
    self::jsonResponse($this->model->find($id), 200);
  }

  public function save(array $data)
  {
    $lastId = $this->model->save($data);
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

  public function order (array $data) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      throw new \Exception("Invalid request method", 404);
    }

    $commande = [
      "nom" => $data['nom'],
      "prenom" => $data['prenom'],
      "telephone" => $data['telephone'],
      "mail" => $data['mail'],
      "carte" => $data['carte']
    ];
    $commandeId = $this->model->save($commande);

    $plats = json_decode($data['plats'], true);
    foreach($plats as $key => $plat) {
      $lienCommande = $plat;
      $lienCommande['commande'] = $commandeId;
      (new LienCommandeModel)->save($lienCommande);
    }

    self::jsonResponse($this->model->find($commandeId), 201);
  }
}