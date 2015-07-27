<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ComprasBundle\Entity\EbSubsegmento;
use elever\ComprasBundle\Form\EbSubsegmentoType;

/**
 * Subsegmento controller.
 *
 * @Route("/compras/subsegmento")
 */
class SubsegmentoController extends Controller
{

	/**
     * Lists all EbSubsegmento entities.
	 *
	 * @Route("/", name="compras_subsegmento")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction ()
	{
		$em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ComprasBundle:EbSubsegmento')->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
     * Creates a new EbSubsegmento entity.
	 *
	 * @Route("/", name="compras_subsegmento_create")
	 * @Method("POST")
     * @Template("ComprasBundle:EbSubsegmento:new.html.twig")
	 */
	public function createAction (Request $request)
	{
        $entity = new EbSubsegmento();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('compras_subsegmento_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
     * Creates a form to create a EbSubsegmento entity.
	 *
     * @param EbSubsegmento $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
    private function createCreateForm(EbSubsegmento $entity)
	{
        $form = $this->createForm(new EbSubsegmentoType(), $entity, array(
			'action' => $this->generateUrl('compras_subsegmento_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Create'));

		return $form;
	}

	/**
     * Displays a form to create a new EbSubsegmento entity.
	 *
	 * @Route("/new", name="compras_subsegmento_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction ()
	{
        $entity = new EbSubsegmento();
		$form = $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
     * Finds and displays a EbSubsegmento entity.
	 *
	 * @Route("/{id}", name="compras_subsegmento_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComprasBundle:EbSubsegmento')->find($id);

		if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbSubsegmento entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
			'entity' => $entity,
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
     * Creates a form to delete a EbSubsegmento entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm ($id)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('compras_subsegmento_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit', 'submit', array('label' => 'Delete'))
			->getForm();
	}

	/**
     * Displays a form to edit an existing EbSubsegmento entity.
	 *
	 * @Route("/{id}/edit", name="compras_subsegmento_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComprasBundle:EbSubsegmento')->find($id);

		if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbSubsegmento entity.');
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
     * Creates a form to edit a EbSubsegmento entity.
	 *
     * @param EbSubsegmento $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
    private function createEditForm(EbSubsegmento $entity)
	{
        $form = $this->createForm(new EbSubsegmentoType(), $entity, array(
			'action' => $this->generateUrl('compras_subsegmento_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Update'));

		return $form;
	}

	/**
     * Edits an existing EbSubsegmento entity.
	 *
	 * @Route("/{id}", name="compras_subsegmento_update")
	 * @Method("PUT")
	 * @Template("ComprasBundle:Subsegmento:edit.html.twig")
	 */
	public function updateAction (Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComprasBundle:EbSubsegmento')->find($id);

		if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbSubsegmento entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->flush();

			return $this->redirect($this->generateUrl('compras_subsegmento_edit', array('id' => $id)));
		}

		return array(
			'entity' => $entity,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
     * Deletes a EbSubsegmento entity.
	 *
	 * @Route("/{id}", name="compras_subsegmento_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction (Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ComprasBundle:EbSubsegmento')->find($id);

			if (!$entity) {
                throw $this->createNotFoundException('Unable to find EbSubsegmento entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('compras_subsegmento'));
	}

	/**
	 * Metodo para renderizar umn campo de select para subgmentos
	 * @Route("/getsubsegmento/{idSegmento}", name="compras_subsegmento_getsubsegmento")
	 * @Template("ComprasBundle:Subsegmento:subsegmento.html.twig")
	 * @Method("POST")
	 *
	 */
	public function getsubsegmentoAction ($idSegmento)
	{
		$em = $this->getDoctrine()->getManager();
		$subsegmentos = $em->getRepository('ComprasBundle:EbSubsegmento')->getSubsegmentoByIdSegmento($idSegmento);
		return array("subsegmentos" => $subsegmentos);
	}

}
