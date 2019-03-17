<?php

namespace ApiSikaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
	public function loginAction(Request $request)
    {

        $auth = $this->get('security.authentication_utils');
        $error = $auth->getLastAuthenticationError();
        $lastUsername = $auth->getLastUserName();

	    return $this->render('security/login.html.twig', [
	        'last_username' => $lastUsername,
	        'error'         => $error,
	    ]);    	
    }
}