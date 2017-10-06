<?php

namespace MinimalOriginal\SecurityBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

use MinimalOriginal\CoreBundle\Annotation\Exposure;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * {@inheritdoc}
     *
     * @Exposure(groups = {"manager"}, name = "Nom d'utilisateur")
     */
    protected $username;

    /**
     * {@inheritdoc}
     *
     * @Exposure(groups = {"manager"}, name = "Email")
     */
    protected $email;

    /**
     * {@inheritdoc}
     *
     * @Exposure(groups = {"manager"}, name = "Valide")
     */
    protected $enabled;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
