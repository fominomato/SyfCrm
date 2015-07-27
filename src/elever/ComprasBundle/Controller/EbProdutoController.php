<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ComprasBundle\Entity\EbProduto;
use elever\ComprasBundle\Form\EbProdutoType;

/**
 * EbProduto controller.
 *
 * @Route("/compras/pedido")
 */
class EbProdutoController extends Controller
{

	/**
	 * Lists all EbProduto entities.
	 *
	 * @Route("/", name="compras_pedido")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction ()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('ComprasBundle:EbProduto')->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
	 * Creates a new EbProduto entity.
	 *
	 * @Route("/create", name="compras_pedido_create")
	 * @Method("POST")
	 * @Template("ComprasBundle:EbProduto:new.html.twig")
	 */
	public function createAction (Request $request)
	{
		$entity = new EbProduto();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('compras_pedido_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a EbProduto entity.
	 *
	 * @param EbProduto $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm (EbProduto $entity)
	{
		$form = $this->createForm(new EbProdutoType(), $entity, array(
			'action' => $this->generateUrl('compras_pedido_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Create'));

		return $form;
	}

	/**
	 * Displays a form to create a new EbProduto entity.
	 *
	 * @Route("/new", name="compras_pedido_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction ()
	{
		$entity = new EbProduto();
		$form = $this->createCreateForm($entity);

		$em = $this->getDoctrine()->getManager();
		$segmentos = $em->getRepository('ComprasBundle:EbSegmento')->findAll();
        $condicoes = $em->getRepository('ComprasBundle:EbCondicaoPagamento')->findAll();

		return array(
			'segmentos' => $segmentos,
			'entity' => $entity,
            'condicoes' => $condicoes,
			'form' => $form->createView(),
		);
	}

	/**
	 * Finds and displays a EbProduto entity.
	 *
	 * @Route("/{id}", name="compras_pedido_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbProduto')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbProduto entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
			'entity' => $entity,
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Creates a form to delete a EbProduto entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm ($id)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('compras_pedido_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit', 'submit', array('label' => 'Delete'))
			->getForm();
	}

	/**
	 * Displays a form to edit an existing EbProduto entity.
	 *
	 * @Route("/{id}/edit", name="compras_pedido_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbProduto')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbProduto entity.');
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
	 * Creates a form to edit a EbProduto entity.
	 *
	 * @param EbProduto $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm (EbProduto $entity)
	{
		$form = $this->createForm(new EbProdutoType(), $entity, array(
			'action' => $this->generateUrl('compras_pedido_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Update'));

		return $form;
	}

	/**
	 * Edits an existing EbProduto entity.
	 *
	 * @Route("/{id}", name="compras_pedido_update")
	 * @Method("PUT")
	 * @Template("ComprasBundle:EbProduto:edit.html.twig")
	 */
	public function updateAction (Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbProduto')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbProduto entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->flush();

			return $this->redirect($this->generateUrl('compras_pedido_edit', array('id' => $id)));
		}

		return array(
			'entity' => $entity,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a EbProduto entity.
	 *
	 * @Route("/{id}", name="compras_pedido_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction (Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('ComprasBundle:EbProduto')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find EbProduto entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('compras_pedido'));
	}
}
