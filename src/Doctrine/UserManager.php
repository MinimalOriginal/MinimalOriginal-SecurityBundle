<?php

namespace MinimalOriginal\SecurityBundle\Doctrine;

use MinimalOriginal\CoreBundle\Doctrine\EntityManagerInterface;
use FOS\UserBundle\Doctrine\UserManager as BaseUserManager;

class UserManager extends BaseUserManager implements EntityManagerInterface
{

  public function createModel($entity_class){
    return $em->createUser();
  }

  public function updateModel($model, $andFlush = true){
    $em->updateUser($model,$andFlush);
  }

}
