<?php
namespace Core\Controller;

use Core\Trait\JsonTrait;

/**
 * Une class abstract est une class parent qui ne peut être instanciée.
 * Elle contient obligatoirement des méthodes abstract.
 * 
 * Ces méthodes abstract sont des méthodes que l'on doit obligatoirement définir dans les class enfant
 */
class DefaultController{

    use JsonTrait;

    public function index() {
        throw new \Exception("Invalid request method", 404);
    }

    public function single(int $id) {
        throw new \Exception("Invalid request method", 404);
    }

    public function save(array $data) {
        throw new \Exception("Invalid request method", 404);
    }

    public function update(int $id, array $data) {
        throw new \Exception("Invalid request method", 404);
    }

    public function delete(int $id) {
        throw new \Exception("Invalid request delete method", 404);
    }
}