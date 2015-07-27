<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ComprasBundle\Entity\EbNfeItem;
use elever\ComprasBundle\Form\EbNfeItemType;

/**
 * EbNfeItem controller.
 *
 * @Route("/compras/nfe/item")
 */
class EbNfeItemController extends Controller
{

	/**
	 * Lists all EbNfeItem entities.
	 *
	 * @Route("/", name="compras_nfe_item")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction ()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('ComprasBundle:EbNfeItem')->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
	 * Creates a new EbNfeItem entity.
	 *
	 * @Route("/", name="compras_nfe_item_create")
	 * @Method("POST")
	 * @Template("ComprasBundle:EbNfeItem:new.html.twig")
	 */
	public function createAction (Request $request)
	{
		$entity = new EbNfeItem();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('compras_nfe_item_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a EbNfeItem entity.
	 *
	 * @param EbNfeItem $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm (EbNfeItem $entity)
	{
		$form = $this->createForm(new EbNfeItemType(), $entity, array(
			'action' => $this->generateUrl('compras_nfe_item_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Create'));

		return $form;
	}

	/**
	 * Displays a form to create a new EbNfeItem entity.
	 *
	 * @Route("/new", name="compras_nfe_item_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction ()
	{
		$entity = new EbNfeItem();
		$form = $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Finds and displays a EbNfeItem entity.
	 *
	 * @Route("/{id}", name="compras_nfe_item_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbNfeItem')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbNfeItem entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
			'entity' => $entity,
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Creates a form to delete a EbNfeItem entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm ($id)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('compras_nfe_item_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit', 'submit', array('label' => 'Delete'))
			->getForm();
	}

	/**
	 * Displays a form to edit an existing EbNfeItem entity.
	 *
	 * @Route("/{id}/edit", name="compras_nfe_item_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbNfeItem')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbNfeItem entity.');
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
	 * Creates a form to edit a EbNfeItem entity.
	 *
	 * @param EbNfeItem $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm (EbNfeItem $entity)
	{
		$form = $this->createForm(new EbNfeItemType(), $entity, array(
			'action' => $this->generateUrl('compras_nfe_item_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Update'));

		return $form;
	}

	/**
	 * Edits an existing EbNfeItem entity.
	 *
	 * @Route("/{id}", name="compras_nfe_item_update")
	 * @Method("PUT")
	 * @Template("ComprasBundle:EbNfeItem:edit.html.twig")
	 */
	public function updateAction (Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbNfeItem')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbNfeItem entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->flush();

			return $this->redirect($this->generateUrl('compras_nfe_item_edit', array('id' => $id)));
		}

		return array(
			'entity' => $entity,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a EbNfeItem entity.
	 *
	 * @Route("/{id}", name="compras_nfe_item_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction (Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('ComprasBundle:EbNfeItem')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find EbNfeItem entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('compras_nfe_item'));
	}
}
