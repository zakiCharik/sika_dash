<?php

namespace ApiSikaBundle\Controller;

use ApiSikaBundle\Entity\Scan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Scan controller.
 *
 * @Route("scan")
 */
class ScanController extends Controller
{
    /**
     * Lists all scan entities.
     *
     * @Route("/", name="scan_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $scans = $em->getRepository('ApiSikaBundle:Scan')->findAll();

        return $this->render('scan/index.html.twig', array(
            'scans' => $scans,
        ));
    }

    /**
     * Creates a new scan entity.
     *
     * @Route("/new", name="scan_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $scan = new Scan();
        $form = $this->createForm('ApiSikaBundle\Form\ScanType', $scan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($scan);
            $em->flush();

            return $this->redirectToRoute('scan_show', array('id' => $scan->getId()));
        }

        return $this->render('scan/new.html.twig', array(
            'scan' => $scan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a scan entity.
     *
     * @Route("/{id}", name="scan_show")
     * @Method("GET")
     */
    public function showAction(Scan $scan)
    {
        $deleteForm = $this->createDeleteForm($scan);

        return $this->render('scan/show.html.twig', array(
            'scan' => $scan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing scan entity.
     *
     * @Route("/{id}/edit", name="scan_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Scan $scan)
    {
        $deleteForm = $this->createDeleteForm($scan);
        $editForm = $this->createForm('ApiSikaBundle\Form\ScanType', $scan);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scan_edit', array('id' => $scan->getId()));
        }

        return $this->render('scan/edit.html.twig', array(
            'scan' => $scan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a scan entity.
     *
     * @Route("/{id}", name="scan_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Scan $scan)
    {
        $form = $this->createDeleteForm($scan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($scan);
            $em->flush();
        }

        return $this->redirectToRoute('scan_index');
    }

    /**
     * Creates a form to delete a scan entity.
     *
     * @param Scan $scan The scan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Scan $scan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('scan_delete', array('id' => $scan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
