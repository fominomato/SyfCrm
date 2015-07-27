<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ComprasBundle\Entity\EbNfe;
use elever\ComprasBundle\Form\EbNfeType;

/**
 * Nfe controller.
 *
 * @Route("/compras/nfe")
 */
class NfeController extends Controller
{

	/**
	 * Lists all EbNfe entities.
	 *
	 * @Route("/", name="compras_nfe")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction ()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('ComprasBundle:EbNfe')->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
	 * Creates a new EbNfe entity.
	 *
	 * @Route("/", name="compras_nfe_create")
	 * @Method("POST")
	 * @Template("ComprasBundle:EbNfe:new.html.twig")
	 */
	public function createAction (Request $request)
	{
		$entity = new EbNfe();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('compras_nfe_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a EbNfe entity.
	 *
	 * @param EbNfe $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm (EbNfe $entity)
	{
		$form = $this->createForm(new EbNfeType(), $entity, array(
			'action' => $this->generateUrl('compras_nfe_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Create'));

		return $form;
	}

	/**
	 * Displays a form to create a new EbNfe entity.
	 *
	 * @Route("/new", name="compras_nfe_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction ()
	{
		$entity = new EbNfe();
		$form = $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Finds and displays a EbNfe entity.
	 *
	 * @Route("/{id}", name="compras_nfe_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbNfe')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbNfe entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
			'entity' => $entity,
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Creates a form to delete a EbNfe entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm ($id)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('compras_nfe_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit', 'submit', array('label' => 'Delete'))
			->getForm();
	}

	/**
	 * Displays a form to edit an existing EbNfe entity.
	 *
	 * @Route("/{id}/edit", name="compras_nfe_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbNfe')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbNfe entity.');
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
	 * Creates a form to edit a EbNfe entity.
	 *
	 * @param EbNfe $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm (EbNfe $entity)
	{
		$form = $this->createForm(new EbNfeType(), $entity, array(
			'action' => $this->generateUrl('compras_nfe_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Update'));

		return $form;
	}

	/**
	 * Edits an existing EbNfe entity.
	 *
	 * @Route("/{id}", name="compras_nfe_update")
	 * @Method("PUT")
	 * @Template("ComprasBundle:EbNfe:edit.html.twig")
	 */
	public function updateAction (Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbNfe')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbNfe entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->flush();

			return $this->redirect($this->generateUrl('compras_nfe_edit', array('id' => $id)));
		}

		return array(
			'entity' => $entity,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a EbNfe entity.
	 *
	 * @Route("/{id}", name="compras_nfe_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction (Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('ComprasBundle:EbNfe')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find EbNfe entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('compras_nfe'));
	}
}
