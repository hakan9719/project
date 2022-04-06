<?php
namespace App\Controller;

use App\Model\TablesModel;
use Core\Controller\DefaultController;

class TablesController extends DefaultController {

  public function __construct () {
    $this->model = new TablesModel;
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
}