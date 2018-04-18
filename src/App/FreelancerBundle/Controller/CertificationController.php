<?php

namespace App\FreelancerBundle\Controller;

use App\FreelancerBundle\Entity\Certification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Certification controller.
 *
 */
class CertificationController extends Controller
{
    /**
     * Lists all certification entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $certifications = $em->getRepository('AppFreelancerBundle:Certification')->findAll();

        return $this->render('certification/index.html.twig', array(
            'certifications' => $certifications,
        ));
    }

    /**
     * Creates a new certification entity.
     *
     */
    public function newAction(Request $request)
    {
        $certification = new Certification();
        $form = $this->createForm('App\FreelancerBundle\Form\CertificationType', $certification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($certification);
            $em->flush();

            return $this->redirectToRoute('certification_show', array('id' => $certification->getId()));
        }

        return $this->render('certification/new.html.twig', array(
            'certification' => $certification,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a certification entity.
     *
     */
    public function showAction(Certification $certification)
    {
        $deleteForm = $this->createDeleteForm($certification);

        return $this->render('certification/show.html.twig', array(
            'certification' => $certification,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing certification entity.
     *
     */
    public function editAction(Request $request, Certification $certification)
    {
        $deleteForm = $this->createDeleteForm($certification);
        $editForm = $this->createForm('App\FreelancerBundle\Form\CertificationType', $certification);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('certification_edit', array('id' => $certification->getId()));
        }

        return $this->render('certification/edit.html.twig', array(
            'certification' => $certification,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a certification entity.
     *
     */
    public function deleteAction(Request $request, Certification $certification)
    {
        $form = $this->createDeleteForm($certification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($certification);
            $em->flush();
        }

        return $this->redirectToRoute('certification_index');
    }

    /**
     * Creates a form to delete a certification entity.
     *
     * @param Certification $certification The certification entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Certification $certification)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('certification_delete', array('id' => $certification->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
