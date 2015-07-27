<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ComprasBundle\Entity\EbNotaCredito;
use elever\ComprasBundle\Form\EbNotaCreditoType;

/**
 * EbNotaCredito controller.
 *
 * @Route("/notacredito")
 */
class EbNotaCreditoController extends Controller
{

    /**
     * Lists all EbNotaCredito entities.
     *
     * @Route("/", name="notacredito")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ComprasBundle:EbNotaCredito')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new EbNotaCredito entity.
     *
     * @Route("/", name="notacredito_create")
     * @Method("POST")
     * @Template("ComprasBundle:EbNotaCredito:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EbNotaCredito();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('notacredito_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EbNotaCredito entity.
     *
     * @param EbNotaCredito $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EbNotaCredito $entity)
    {
        $form = $this->createForm(new EbNotaCreditoType(), $entity, array(
            'action' => $this->generateUrl('notacredito_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EbNotaCredito entity.
     *
     * @Route("/new", name="notacredito_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EbNotaCredito();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a EbNotaCredito entity.
     *
     * @Route("/{id}", name="notacredito_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComprasBundle:EbNotaCredito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbNotaCredito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to delete a EbNotaCredito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('notacredito_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

    /**
     * Displays a form to edit an existing EbNotaCredito entity.
     *
     * @Route("/{id}/edit", name="notacredito_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComprasBundle:EbNotaCredito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbNotaCredito entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a EbNotaCredito entity.
     *
     * @param EbNotaCredito $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(EbNotaCredito $entity)
    {
        $form = $this->createForm(new EbNotaCreditoType(), $entity, array(
            'action' => $this->generateUrl('notacredito_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing EbNotaCredito entity.
     *
     * @Route("/{id}", name="notacredito_update")
     * @Method("PUT")
     * @Template("ComprasBundle:EbNotaCredito:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComprasBundle:EbNotaCredito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbNotaCredito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('notacredito_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a EbNotaCredito entity.
     *
     * @Route("/{id}", name="notacredito_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ComprasBundle:EbNotaCredito')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EbNotaCredito entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('notacredito'));
    }
}
