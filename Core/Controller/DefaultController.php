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
    
}