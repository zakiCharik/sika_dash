<?php

namespace ApiSikaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        //fetch all operations
        $operations = $em->getRepository('ApiSikaBundle:Operation')->findAll();
        //total users
        $users = $em->getRepository('ApiSikaBundle:User')->findAll();
        //total Clients
        $clients = $em->getRepository('ApiSikaBundle:Client')->findAll();
        //total scans
        $scans = $em->getRepository('ApiSikaBundle:Scan')->findAll();
        //total scans
        $gifts = $em->getRepository('ApiSikaBundle:Gift')->findAll();

        return $this->render('default/home.html.twig',array(
        	'operations'=> $operations,
        	'users'=> $users,
        	'clients'=> $clients,
        	'scans'=> $scans,
        	'gifts'=> $gifts,
        ));
    }
}
