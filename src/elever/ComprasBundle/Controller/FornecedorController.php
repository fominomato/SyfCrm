<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ComprasBundle\Entity\EbFornecedor;
use elever\ComprasBundle\Form\EbFornecedorType;

/**
 * Fornecedor controller.
 *
 * @Route("/compras/fornecedor")
 */
class FornecedorController extends Controller
{

	/**
	 * Lists all Fornecedor entities.
	 *
	 * @Route("/", name="compras_fornecedor")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction ()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('ComprasBundle:Fornecedor')->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
	 * Creates a new Fornecedor entity.
	 *
	 * @Route("/", name="compras_fornecedor_create")
	 * @Method("POST")
	 * @Template("ComprasBundle:Fornecedor:new.html.twig")
	 */
	public function createAction (Request $request)
	{
		$entity = new EbFornecedor();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('compras_fornecedor_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a Fornecedor entity.
	 *
	 * @param EbFornecedor $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm (EbFornecedor $entity)
	{
		$form = $this->createForm(new EbFornecedorType(), $entity, array(
			'action' => $this->generateUrl('compras_fornecedor_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Create'));

		return $form;
	}

	/**
	 * Displays a form to create a new Fornecedor entity.
	 *
	 * @Route("/new", name="compras_fornecedor_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction ()
	{
		$entity = new EbFornecedor();
		$form = $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Finds and displays a Fornecedor entity.
	 *
	 * @Route("/{id}", name="compras_fornecedor_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:Fornecedor')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Fornecedor entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
			'entity' => $entity,
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Creates a form to delete a Fornecedor entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm ($id)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('compras_fornecedor_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit', 'submit', array('label' => 'Delete'))
			->getForm();
	}

	/**
	 * Displays a form to edit an existing Fornecedor entity.
	 *
	 * @Route("/{id}/edit", name="compras_fornecedor_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:Fornecedor')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Fornecedor entity.');
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
	 * Creates a form to edit a Fornecedor entity.
	 *
	 * @param EbFornecedor $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm (EbFornecedor $entity)
	{
		$form = $this->createForm(new EbFornecedorType(), $entity, array(
			'action' => $this->generateUrl('compras_fornecedor_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Update'));

		return $form;
	}

	/**
	 * Edits an existing Fornecedor entity.
	 *
	 * @Route("/{id}", name="compras_fornecedor_update")
	 * @Method("PUT")
	 * @Template("ComprasBundle:Fornecedor:edit.html.twig")
	 */
	public function updateAction (Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:Fornecedor')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Fornecedor entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->flush();

			return $this->redirect($this->generateUrl('compras_fornecedor_edit', array('id' => $id)));
		}

		return array(
			'entity' => $entity,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a Fornecedor entity.
	 *
	 * @Route("/{id}", name="compras_fornecedor_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction (Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('ComprasBundle:Fornecedor')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Fornecedor entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('compras_fornecedor'));
	}
}
