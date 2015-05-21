<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Validator\Tests\Fixtures\Entity;
use WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais;
use WilsonCorp\Bundle\Comptabilite\FraisBundle\Form\FicheFraisType;

require_once ("functions.php");

/**
 * FicheFrais controller.
 *
 */
class FicheFraisController extends Controller
{

    /**
     * Lists all FicheFrais entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $authorsQuery = $em->createQuery("SELECT v FROM WilsonCorpComptabiliteFraisBundle:Visiteur v");
        $authors=$authorsQuery->getResult();

        $entities = $em->getRepository('WilsonCorpComptabiliteFraisBundle:FicheFrais')->findAll();

        return $this->render('WilsonCorpComptabiliteFraisBundle:FicheFrais:index.html.twig', array(
            'entities' => $entities,
            'authors' => $authors
        ));
    }
    /**
     * Creates a new FicheFrais entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new FicheFrais();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fichefrais_show', array('id' => $entity->getId())));
        }

        return $this->render('WilsonCorpComptabiliteFraisBundle:FicheFrais:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a FicheFrais entity.
     *
     * @param FicheFrais $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FicheFrais $entity)
    {
        $form = $this->createForm(new FicheFraisType(), $entity, array(
            'action' => $this->generateUrl('fichefrais_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FicheFrais entity.
     *
     */
    public function newAction()
    {
        $entity = new FicheFrais();
        $em = $this->getDoctrine()->getManager();
        $form   = $this->createCreateForm($entity);

        /*TODO:A modifier avec la valeur du mois courrant l'id de l'utilisateur connecté */
        $moisCourrant = 05;
        $visiteurConnecte = 6;
        $quantite = 2;

        //On récupère la liste des frais forfaitisés
        $fraisForfaitQuery=$em->createQuery("SELECT f FROM WilsonCorpComptabiliteFraisBundle:FraisForfait f");
        $fraisForfait=$fraisForfaitQuery->getResult();

        //On récupère la fiche de frais du mois courrant correspondant à l'utilisateur connecté
        $ficheFraisQuery=$em->createQuery("
          SELECT f
          FROM WilsonCorpComptabiliteFraisBundle:FicheFrais f
          JOIN f.visiteur v WHERE v.id = $visiteurConnecte
          AND f.mois = $moisCourrant
        ");
        $ficheFrais=$ficheFraisQuery->getResult();

        //On récupère les lignes de frais forfaitisés du mois courant et de l'utilisateur connecté
        $lignesFraisForfaitQuery=$em->createQuery("
          SELECT l
          FROM WilsonCorpComptabiliteFraisBundle:LigneFraisForfait l
          JOIN l.visiteur v WHERE v.id = $visiteurConnecte
          AND l.mois = $moisCourrant
        ");
        $lignesFraisForfait=$lignesFraisForfaitQuery->getResult();

        //On retourne la vue avec Twig
        return $this->render('WilsonCorpComptabiliteFraisBundle:FicheFrais:new.html.twig', array(
            'entity' => $entity,
            'fraisForfait' => $fraisForfait,
            'ficheFrais' => $ficheFrais,
            'lignesFraisForfait' => $lignesFraisForfait,
            'quantite' => $quantite,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FicheFrais entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('WilsonCorpComptabiliteFraisBundle:FicheFrais')->find($id);

        /*TODO:A modifier avec la valeur du mois courrant l'id de l'utilisateur connecté */
        $moisCourrant = 05;
        $visiteurConnecte = 6;
        $quantite = 2;

        //On récupère la liste des frais forfaitisés
        $fraisForfaitQuery=$em->createQuery("SELECT f FROM WilsonCorpComptabiliteFraisBundle:FraisForfait f");
        $fraisForfait=$fraisForfaitQuery->getResult();

        //On récupère la fiche de frais du mois courrant correspondant à l'utilisateur connecté
        $ficheFraisQuery=$em->createQuery("
          SELECT f
          FROM WilsonCorpComptabiliteFraisBundle:FicheFrais f
          JOIN f.visiteur v WHERE v.id = $visiteurConnecte
          AND f.mois = $moisCourrant
        ");
        $ficheFrais=$ficheFraisQuery->getResult();

        //On récupère les lignes de frais forfaitisés du mois courant et de l'utilisateur connecté
        $lignesFraisForfaitQuery=$em->createQuery("
          SELECT l
          FROM WilsonCorpComptabiliteFraisBundle:LigneFraisForfait l
          JOIN l.visiteur v WHERE v.id = $visiteurConnecte
          AND l.mois = $moisCourrant
        ");
        $lignesFraisForfait=$lignesFraisForfaitQuery->getResult();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FicheFrais entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WilsonCorpComptabiliteFraisBundle:FicheFrais:show.html.twig', array(
            'entity'      => $entity,
            'fraisForfait' => $fraisForfait,
            'ficheFrais' => $ficheFrais,
            'lignesFraisForfait' => $lignesFraisForfait,
            'quantite' => $quantite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FicheFrais entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WilsonCorpComptabiliteFraisBundle:FicheFrais')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FicheFrais entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WilsonCorpComptabiliteFraisBundle:FicheFrais:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a FicheFrais entity.
    *
    * @param FicheFrais $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FicheFrais $entity)
    {
        $form = $this->createForm(new FicheFraisType(), $entity, array(
            'action' => $this->generateUrl('fichefrais_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FicheFrais entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WilsonCorpComptabiliteFraisBundle:FicheFrais')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FicheFrais entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fichefrais_edit', array('id' => $id)));
        }

        return $this->render('WilsonCorpComptabiliteFraisBundle:FicheFrais:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a FicheFrais entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WilsonCorpComptabiliteFraisBundle:FicheFrais')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FicheFrais entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fichefrais'));
    }

    /**
     * Creates a form to delete a FicheFrais entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fichefrais_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}