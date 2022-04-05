<?php
namespace App\Model;

use Core\Model\DefaultModel;

class CommandeModel extends DefaultModel {
  protected string $table = 'commande';
  protected string $entity = 'Commande';
}