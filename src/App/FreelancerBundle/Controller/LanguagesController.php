<?php

namespace App\FreelancerBundle\Controller;

use App\FreelancerBundle\Entity\Languages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Language controller.
 *
 */
class LanguagesController extends Controller
{
    /**
     * Lists all language entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $languages = $em->getRepository('AppFreelancerBundle:Languages')->findAll();

        return $this->render('languages/index.html.twig', array(
            'languages' => $languages,
        ));
    }

    /**
     * Creates a new language entity.
     *
     */
    public function newAction(Request $request)
    {
        $language = new Language();
        $form = $this->createForm('App\FreelancerBundle\Form\LanguagesType', $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($language);
            $em->flush();

            return $this->redirectToRoute('languages_show', array('id' => $language->getId()));
        }

        return $this->render('languages/new.html.twig', array(
            'language' => $language,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a language entity.
     *
     */
    public function showAction(Languages $language)
    {
        $deleteForm = $this->createDeleteForm($language);

        return $this->render('languages/show.html.twig', array(
            'language' => $language,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing language entity.
     *
     */
    public function editAction(Request $request, Languages $language)
    {
        $deleteForm = $this->createDeleteForm($language);
        $editForm = $this->createForm('App\FreelancerBundle\Form\LanguagesType', $language);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('languages_edit', array('id' => $language->getId()));
        }

        return $this->render('languages/edit.html.twig', array(
            'language' => $language,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a language entity.
     *
     */
    public function deleteAction(Request $request, Languages $language)
    {
        $form = $this->createDeleteForm($language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($language);
            $em->flush();
        }

        return $this->redirectToRoute('languages_index');
    }

    /**
     * Creates a form to delete a language entity.
     *
     * @param Languages $language The language entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Languages $language)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('languages_delete', array('id' => $language->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
