<?php

namespace PrincipalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PrincipalBundle\Entity\EbModulo;
use PrincipalBundle\Form\EbModuloType;

/**
 * EbModulo controller.
 *
 * @Route("/configuracao/modulo")
 */
class EbModuloController extends Controller
{

    /**
     * Lists all EbModulo entities.
     *
     * @Route("/", name="configuracao_modulo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrincipalBundle:EbModulo')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new EbModulo entity.
     *
     * @Route("/", name="configuracao_modulo_create")
     * @Method("POST")
     * @Template("PrincipalBundle:EbModulo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EbModulo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_modulo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EbModulo entity.
     *
     * @param EbModulo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EbModulo $entity)
    {
        $form = $this->createForm(new EbModuloType(), $entity, array(
            'action' => $this->generateUrl('configuracao_modulo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EbModulo entity.
     *
     * @Route("/new", name="configuracao_modulo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EbModulo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EbModulo entity.
     *
     * @Route("/{id}", name="configuracao_modulo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbModulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbModulo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to delete a EbModulo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
	private function createDeleteForm ($id)
    {
	    return $this->createFormBuilder()
		    ->setAction($this->generateUrl('configuracao_modulo_delete', array('id' => $id)))
		    ->setMethod('DELETE')
		    ->add('submit', 'submit', array('label' => 'Delete'))
		    ->getForm();
    }

    /**
     * Displays a form to edit an existing EbModulo entity.
     *
     * @Route("/{id}/edit", name="configuracao_modulo_edit")
     * @Method("GET")
     * @Template()
     */
	public function editAction ($id)
    {
	    $em = $this->getDoctrine()->getManager();

	    $entity = $em->getRepository('PrincipalBundle:EbModulo')->find($id);

	    if (!$entity) {
		    throw $this->createNotFoundException('Unable to find EbModulo entity.');
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
     * Creates a form to edit a EbModulo entity.
     *
     * @param EbModulo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
	private function createEditForm (EbModulo $entity)
    {
	    $form = $this->createForm(new EbModuloType(), $entity, array(
		    'action' => $this->generateUrl('configuracao_modulo_update', array('id' => $entity->getId())),
		    'method' => 'PUT',
	    ));

	    $form->add('submit', 'submit', array('label' => 'Update'));

	    return $form;
    }

    /**
     * Edits an existing EbModulo entity.
     *
     * @Route("/{id}", name="configuracao_modulo_update")
     * @Method("PUT")
     * @Template("PrincipalBundle:EbModulo:edit.html.twig")
     */
	public function updateAction (Request $request, $id)
    {
	    $em = $this->getDoctrine()->getManager();

	    $entity = $em->getRepository('PrincipalBundle:EbModulo')->find($id);

	    if (!$entity) {
		    throw $this->createNotFoundException('Unable to find EbModulo entity.');
	    }

	    $deleteForm = $this->createDeleteForm($id);
	    $editForm = $this->createEditForm($entity);
	    $editForm->handleRequest($request);

	    if ($editForm->isValid()) {
            $em->flush();

		    return $this->redirect($this->generateUrl('configuracao_modulo_edit', array('id' => $id)));
        }

	    return array(
		    'entity' => $entity,
		    'edit_form' => $editForm->createView(),
		    'delete_form' => $deleteForm->createView(),
	    );
    }

    /**
     * Deletes a EbModulo entity.
     *
     * @Route("/{id}", name="configuracao_modulo_delete")
     * @Method("DELETE")
     */
	public function deleteAction (Request $request, $id)
    {
	    $form = $this->createDeleteForm($id);
	    $form->handleRequest($request);

	    if ($form->isValid()) {
		    $em = $this->getDoctrine()->getManager();
		    $entity = $em->getRepository('PrincipalBundle:EbModulo')->find($id);

		    if (!$entity) {
			    throw $this->createNotFoundException('Unable to find EbModulo entity.');
		    }

		    $em->remove($entity);
		    $em->flush();
	    }

	    return $this->redirect($this->generateUrl('configuracao_modulo'));
    }
}
