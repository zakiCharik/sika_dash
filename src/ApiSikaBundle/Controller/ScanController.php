<?php

namespace ApiSikaBundle\Controller;

use ApiSikaBundle\Entity\Scan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
        //get all scan
        $em = $this->getDoctrine()->getManager();
        $scans = $em->getRepository('ApiSikaBundle:Scan')->findAll();


        if ($form->isSubmitted() && $form->isValid()) {
            //generate the qrcode with the given value qt

            //create the doc using the qr and the qt

            //Persist the doc in the entity

            //return the url t the doc and display t the view after persist
            $em = $this->getDoctrine()->getManager();
            $em->persist($scan);
            $em->flush();

            return $this->render('scan_new', array(
                'scans' => $scans,
                'scan' => $scan,
                'qr' => '-',
                'form' => $form->createView(),
            ));
        }

        return $this->render('scan/new.html.twig', array(
            'scans' => $scans,
            'scan' => $scan,
            'qr' => '-',
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

    /**
     * Print a  scan entity.
     *
     * @Route("/{id}/print", name="scan_print")
     * @Method({"GET"})
     */
    public function PDF_ScanAction(Scan $scan)
    {

        $options = array(
            'code'   => 'SIKA;MOBILE;PRODUCTID;'.$scan->getCreatedTime()->format('d/m/Y').';'. $scan->getQrValue(),
            'type'   => 'qrcode',
            'format' => 'html',
        );

        $barcode =  $this->get('skies_barcode.generator')->generate($options);

        $pdf = $this->get("white_october.tcpdf")->create();
        $html = $this->render('scan/printGenerated.pdf.twig', array(
            'scan' => $scan,
            'barcode' => $barcode
        ));
     
     
        // Retire le footer/header par défaut, contenant les barres de margin
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
     
        // Ajout page

        // set style for barcode
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
            $pdf->AddPage();

        for( $j = 1;$j < $scan->getQt()+1/4; $j++  ){
            for( $i = 0;$i < 200; $i = $i + 40  ){
                $pdf->write2DBarcode('SIKA;MOBILE;PRODUCTID;'.$scan->getCreatedTime()->format('d/m/Y').';'. $scan->getQrValue(), 'QRCODE,L',$i, $j*40, 40, 40, $style, 'N');                
            }

        }        
        // $pdf->writeHTML($html, true, false, true, false, '');
        // Reset pointeur
        // $pdf->lastPage();
        //
        $response = new Response($pdf->Output('printGenerated.pdf'));
        //update the $scan object and generate the doc 
        $scan->setDocFile($response);
        $scan->setGenerationTime(new\Datetime());
        $this->getDoctrine()->getManager()->flush();

        $response->headers->set('Content-Type', 'application/pdf');
          
        return $response;
    }

}
