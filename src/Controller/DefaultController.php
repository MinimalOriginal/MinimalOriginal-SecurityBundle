<?php

namespace MinimalOriginal\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MinimalOriginal\CoreBundle\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/login", name="minimal_security_login")
     */
    public function loginAction()
    {
        return $this->render('MinimalSecurityBundle:Default:index.html.twig');
    }

    /**
     * @Route("/logout", name="minimal_security_logout")
     */
    public function logoutAction()
    {
        return $this->render('MinimalSecurityBundle:Default:index.html.twig');
    }
}
