<?php

namespace MinimalOriginal\SecurityBundle;

use MinimalOriginal\CoreBundle\Modules\ManageableModuleInterface;
use MinimalOriginal\CoreBundle\Modules\AbstractModule;

use FOS\UserBundle\Model\UserManagerInterface;

use MinimalOriginal\SecurityBundle\Form\UserType;
use MinimalOriginal\SecurityBundle\Entity\User;

class MinimalModule extends AbstractModule implements ManageableModuleInterface{

  protected $userManager;

  /**
   *
   * @param UserManagerInterface $userManager
   *
  **/
  public function __construct(UserManagerInterface $userManager){
    $this->userManager = $userManager;
    parent::__construct();
  }

  /**
   * {@inheritdoc}
   */
  public function init(){
    $this->informations->set('name', 'security');
    $this->informations->set('title', 'Sécurité');
    $this->informations->set('description', "Créez ou modifiez les utilisateurs de votre site.");
    $this->informations->set('icon', "ion-ios-locked-outline");
    return $this;
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

  /**
   * {@inheritdoc}
   */
  public function getParent(){
    return null;
  }

}
