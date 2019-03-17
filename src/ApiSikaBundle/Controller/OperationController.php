<?php

namespace ApiSikaBundle\Controller;

use ApiSikaBundle\Entity\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Operation controller.
 *
 * @Route("operation")
 */
class OperationController extends Controller
{
    /**
     * Lists all operation entities.
     *
     * @Route("/", name="operation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operations = $em->getRepository('ApiSikaBundle:Operation')->findAll();

        return $this->render('operation/index.html.twig', array(
            'operations' => $operations,
        ));
    }

    /**
     * Lists all operation entities.
     *
     * @Route("/isvalidated", name="operation_index_validate")
     * @Method("GET")
     */
    public function indexValidatesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operations = $em->getRepository('ApiSikaBundle:Operation')->findBy(array('etatValidation' => true));

        return $this->render('operation/validated.html.twig', array(
            'operations' => $operations,
        ));
    }

    /**
     * Lists all operation entities.
     *
     * @Route("/ajaxindex", name="operation_indexApi")
     * @Method("GET")
     */
    public function indexApiAction()
    {
        $em = $this->getDoctrine()->getManager();
        $operations = $em->getRepository('ApiSikaBundle:Operation')->findAll();


        $operationsArray = array();
        foreach ($operations as $op ) {
            # code...
            $operationsArray[] = array(
                'id' => $op->getId(), 
                'value' => $op->getValue(), 
                'fromDevice' => $op->getfromDevice(), 
                'createdTime' => $op->getCreatedTime(), 
                'ModifiedTime' => $op->getModifiedTime(), 
                'dateValidation' => $op->getDateValidation(), 
                'etatValidation' => $op->getEtatValidation()
            );
        }

        $response = new JsonResponse(($operationsArray));
        // Allow all websites
        $response->headers->set('Access-Control-Allow-Origin', '*');        
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Creates a new operation entity.
     *
     * @Route("/ajaxnew", name="operation_new")
     */
    public function ajaxNewAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            //preparing the values from request
            $clientid = $request->request->get('clientid');
            $value = $request->request->get('value');
            $fromDevice = $request->request->get('fromDevice');
            //Preparing the emManager
            $em = $this->getDoctrine()->getManager();
            $operation = new Operation();

            //fetching the client
            $client = $em->getRepository('ApiSikaBundle:Client')->find($clientid);        
            $operation->setClient($client);       
            //seting data
            $operation->setValue($value);        
            $operation->setFromDevice($fromDevice);        
            $operation->setCreatedTime(new \Datetime());        
            //persist
            $em->persist($operation);
            $em->flush();    

            $response = new Response(json_encode(array(
                'titre' => $titre,
                'producteur' => $producteur
            )));
            //setting header return value
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }        
    }


    /**
     * Creates a new operation entity.
     *
     * @Route("/new", name="operation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $operation = new Operation();
        $form = $this->createForm('ApiSikaBundle\Form\OperationType', $operation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operation);
            $em->flush();

            return $this->redirectToRoute('operation_show', array('id' => $operation->getId()));
        }

        return $this->render('operation/new.html.twig', array(
            'operation' => $operation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a operation entity.
     *
     * @Route("/{id}", name="operation_show")
     * @Method("GET")
     */
    public function showAction(Operation $operation)
    {
        $deleteForm = $this->createDeleteForm($operation);

        return $this->render('operation/show.html.twig', array(
            'operation' => $operation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing operation entity.
     *
     * @Route("/{id}/edit", name="operation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Operation $operation)
    {
        $deleteForm = $this->createDeleteForm($operation);
        $editForm = $this->createForm('ApiSikaBundle\Form\OperationType', $operation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $operation->setDateValidation(new \Datetime());
            // returns User object or null if not authenticated
            $user = $this->security->getUser();            
            $operation->setByValidation($user);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operation_edit', array('id' => $operation->getId()));
        }

        return $this->render('operation/edit.html.twig', array(
            'operation' => $operation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing operation entity.
     *
     * @Route("/{id}/validate", name="operation_validate")
     * @Method({"GET", "POST"})
     */
    public function validateAction(Request $request, Operation $operation)
    {
        $deleteForm = $this->createDeleteForm($operation);
        $editForm = $this->createForm('ApiSikaBundle\Form\OperationValidateType', $operation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operation_show', array('id' => $operation->getId()));
        }

        return $this->render('operation/edit.html.twig', array(
            'operation' => $operation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a operation entity.
     *
     * @Route("/{id}", name="operation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Operation $operation)
    {
        $form = $this->createDeleteForm($operation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operation);
            $em->flush();
        }

        return $this->redirectToRoute('operation_index');
    }

    /**
     * Creates a form to delete a operation entity.
     *
     * @param Operation $operation The operation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Operation $operation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operation_delete', array('id' => $operation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
