<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ComprasBundle\Entity\EbSegmento;
use elever\ComprasBundle\Form\EbSegmentoType;

/**
 * Segmento controller.
 *
 * @Route("/compras/segmento")
 */
class SegmentoController extends Controller
{

	/**
	 * Lists all EbSegmento entities.
	 *
	 * @Route("/", name="compras_segmento")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction ()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('ComprasBundle:EbSegmento')->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
	 * Creates a new EbSegmento entity.
	 *
	 * @Route("/", name="compras_segmento_create")
	 * @Method("POST")
	 * @Template("ComprasBundle:EbSegmento:new.html.twig")
	 */
	public function createAction (Request $request)
	{
		$entity = new EbSegmento();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('compras_segmento_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a EbSegmento entity.
	 *
	 * @param EbSegmento $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm (EbSegmento $entity)
	{
		$form = $this->createForm(new EbSegmentoType(), $entity, array(
			'action' => $this->generateUrl('compras_segmento_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Create'));

		return $form;
	}

	/**
	 * Displays a form to create a new EbSegmento entity.
	 *
	 * @Route("/new", name="compras_segmento_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction ()
	{
		$entity = new EbSegmento();
		$form = $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Finds and displays a EbSegmento entity.
	 *
	 * @Route("/{id}", name="compras_segmento_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbSegmento')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbSegmento entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
			'entity' => $entity,
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Creates a form to delete a EbSegmento entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm ($id)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('compras_segmento_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit', 'submit', array('label' => 'Delete'))
			->getForm();
	}

	/**
	 * Displays a form to edit an existing EbSegmento entity.
	 *
	 * @Route("/{id}/edit", name="compras_segmento_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbSegmento')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbSegmento entity.');
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
	 * Creates a form to edit a EbSegmento entity.
	 *
	 * @param EbSegmento $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm (EbSegmento $entity)
	{
		$form = $this->createForm(new EbSegmentoType(), $entity, array(
			'action' => $this->generateUrl('compras_segmento_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Update'));

		return $form;
	}

	/**
	 * Edits an existing EbSegmento entity.
	 *
	 * @Route("/{id}", name="compras_segmento_update")
	 * @Method("PUT")
	 * @Template("ComprasBundle:EbSegmento:edit.html.twig")
	 */
	public function updateAction (Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbSegmento')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbSegmento entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->flush();

			return $this->redirect($this->generateUrl('compras_segmento_edit', array('id' => $id)));
		}

		return array(
			'entity' => $entity,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a EbSegmento entity.
	 *
	 * @Route("/{id}", name="compras_segmento_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction (Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('ComprasBundle:EbSegmento')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find EbSegmento entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('compras_segmento'));
	}
}
