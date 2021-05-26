<?php

namespace AppBundle\Controller;

use AppBundle\Entity\messurementUnits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Messurementunit controller.
 *
 */
class messurementUnitsController extends Controller
{
    /**
     * Lists all messurementUnit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $messurementUnits = $em->getRepository('AppBundle:messurementUnits')->findAll();

        return $this->render('@App/messurementunits/index.html.twig', array(
            'messurementUnits' => $messurementUnits,
        ));
    }

    /**
     * Creates a new messurementUnit entity.
     *
     */
    public function newAction(Request $request)
    {
        $messurementUnit = new Messurementunits();
        // dump($messurementUnit);die();
        $form = $this->createForm('AppBundle\Form\messurementUnitsType', $messurementUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //NOTE Seteado de valores 
            $messurementUnit-> setDateCreate(new \DateTime("now"));
            $messurementUnit-> setDateUpdate(new \DateTime("0000-01-01 00:00:00"));
            $em->persist($messurementUnit);
            $em->flush();

            return $this->redirectToRoute('messurementunits_show', array('id' => $messurementUnit->getId()));
        }
        else {
            $this->addFlash('msg', "Ya existe esta unidad de medida");
        }
        
        return $this->render('@App/messurementunits/new.html.twig', array(
            'messurementUnit' => $messurementUnit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a messurementUnit entity.
     *
     */
    public function showAction(messurementUnits $messurementUnit)
    {
        $deleteForm = $this->createDeleteForm($messurementUnit);

        return $this->render('@App/messurementunits/show.html.twig', array(
            'messurementUnit' => $messurementUnit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing messurementUnit entity.
     *
     */
    public function editAction(Request $request, messurementUnits $messurementUnit)
    {
        $deleteForm = $this->createDeleteForm($messurementUnit);
        $editForm = $this->createForm('AppBundle\Form\messurementUnitsType', $messurementUnit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('messurementunits_edit', array('id' => $messurementUnit->getId()));
        }

        return $this->render('@App/messurementunits/edit.html.twig', array(
            'messurementUnit' => $messurementUnit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a messurementUnit entity.
     *
     */
    public function deleteAction(Request $request, messurementUnits $messurementUnit)
    {
        $form = $this->createDeleteForm($messurementUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($messurementUnit);
            $em->flush();
        }

        return $this->redirectToRoute('messurementunits_index');
    }

    /**
     * Creates a form to delete a messurementUnit entity.
     *
     * @param messurementUnits $messurementUnit The messurementUnit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(messurementUnits $messurementUnit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('messurementunits_delete', array('id' => $messurementUnit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
