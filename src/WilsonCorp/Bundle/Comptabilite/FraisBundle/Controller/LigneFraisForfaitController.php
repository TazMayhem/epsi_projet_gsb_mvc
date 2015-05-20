<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait;
use WilsonCorp\Bundle\Comptabilite\FraisBundle\Form\LigneFraisForfaitType;

/**
 * LigneFraisForfait controller.
 *
 */
class LigneFraisForfaitController extends Controller
{

    /**
     * Lists all LigneFraisForfait entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait')->findAll();

        return $this->render('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new LigneFraisForfait entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new LigneFraisForfait();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lignefraisforfait_show', array('id' => $entity->getId())));
        }

        return $this->render('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a LigneFraisForfait entity.
     *
     * @param LigneFraisForfait $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(LigneFraisForfait $entity)
    {
        $form = $this->createForm(new LigneFraisForfaitType(), $entity, array(
            'action' => $this->generateUrl('lignefraisforfait_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LigneFraisForfait entity.
     *
     */
    public function newAction()
    {
        $entity = new LigneFraisForfait();
        $form   = $this->createCreateForm($entity);

        return $this->render('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LigneFraisForfait entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneFraisForfait entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LigneFraisForfait entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneFraisForfait entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a LigneFraisForfait entity.
    *
    * @param LigneFraisForfait $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LigneFraisForfait $entity)
    {
        $form = $this->createForm(new LigneFraisForfaitType(), $entity, array(
            'action' => $this->generateUrl('lignefraisforfait_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LigneFraisForfait entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneFraisForfait entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lignefraisforfait_edit', array('id' => $id)));
        }

        return $this->render('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a LigneFraisForfait entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WilsonCorpComptabiliteFraisBundle:LigneFraisForfait')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LigneFraisForfait entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lignefraisforfait'));
    }

    /**
     * Creates a form to delete a LigneFraisForfait entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lignefraisforfait_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
