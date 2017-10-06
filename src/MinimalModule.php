<?php

namespace MinimalOriginal\SecurityBundle;

use MinimalOriginal\CoreBundle\Modules\ManageableModuleInterface;

use FOS\UserBundle\Model\UserManagerInterface;

use MinimalOriginal\SecurityBundle\Form\UserType;
use MinimalOriginal\SecurityBundle\Entity\User;

class MinimalModule implements ManageableModuleInterface{

  protected $userManager;

  /**
   *
   * @param UserManagerInterface $userManager
   *
  **/
  public function __construct(UserManagerInterface $userManager){
    $this->userManager = $userManager;
  }

  /**
   * {@inheritdoc}
   */
  public function getName(){
    return 'security';
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle(){
    return "Sécurité";
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription(){
    return "Créez ou modifiez les utilisateurs de votre site.";
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityClass(){
    return User::class;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormTypeClass(){
    return UserType::class;
  }

  public function createModel(){
    return $this->userManager->createUser();
  }

  public function updateModel($model, $andFlush = true){
    $this->userManager->updateUser($model, $andFlush);
  }

  public function removeModel($model, $andFlush = true){
    $this->userManager->deleteUser($model);
  }

}
