<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ComprasBundle\Entity\EbRegra;
use elever\ComprasBundle\Form\EbRegraType;

/**
 * Regra controller.
 *
 * @Route("/compras/regra")
 */
class RegraController extends Controller
{

	/**
	 * Lists all EbRegra entities.
	 *
	 * @Route("/", name="compras_regra")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction ()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('ComprasBundle:EbRegra')->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
	 * Creates a new EbRegra entity.
	 *
	 * @Route("/", name="compras_regra_create")
	 * @Method("POST")
	 * @Template("ComprasBundle:Regra:new.html.twig")
	 */
	public function createAction (Request $request)
	{
		$entity = new EbRegra();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('compras_regra_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a EbRegra entity.
	 *
	 * @param EbRegra $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm (EbRegra $entity)
	{
		$form = $this->createForm(new EbRegraType(), $entity, array(
			'action' => $this->generateUrl('compras_regra_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Create'));

		return $form;
	}

	/**
	 * Displays a form to create a new EbRegra entity.
	 *
	 * @Route("/new", name="compras_regra_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction ()
	{
		$entity = new EbRegra();
		$form = $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	/**
	 * Finds and displays a EbRegra entity.
	 *
	 * @Route("/{id}", name="compras_regra_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbRegra')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbRegra entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
			'entity' => $entity,
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Creates a form to delete a EbRegra entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm ($id)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('compras_regra_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit', 'submit', array('label' => 'Delete'))
			->getForm();
	}

	/**
	 * Displays a form to edit an existing EbRegra entity.
	 *
	 * @Route("/{id}/edit", name="compras_regra_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction ($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbRegra')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbRegra entity.');
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
	 * Creates a form to edit a EbRegra entity.
	 *
	 * @param EbRegra $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm (EbRegra $entity)
	{
		$form = $this->createForm(new EbRegraType(), $entity, array(
			'action' => $this->generateUrl('compras_regra_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Update'));

		return $form;
	}

	/**
	 * Edits an existing EbRegra entity.
	 *
	 * @Route("/{id}", name="compras_regra_update")
	 * @Method("PUT")
	 * @Template("ComprasBundle:Regra:edit.html.twig")
	 */
	public function updateAction (Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('ComprasBundle:EbRegra')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find EbRegra entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->flush();

			return $this->redirect($this->generateUrl('compras_regra_edit', array('id' => $id)));
		}

		return array(
			'entity' => $entity,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a EbRegra entity.
	 *
	 * @Route("/{id}", name="compras_regra_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction (Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('ComprasBundle:EbRegra')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find EbRegra entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('compras_regra'));
	}

    /**
     * Metodo para renderizar uma ou mais regras
     * @Route("/getregra/{action}/{id}", name="compras_regra_getregras")
     * @Template("ComprasBundle:Regra:getregra.html.twig")
     * @Method("POST")
     *
     */
    public function getRegraAction ($id, $action)
    {
        $em = $this->getDoctrine()->getManager();
        $regras = null;
        switch($action)
        {
            case "empresa":
                $regras = $em->getRepository('ComprasBundle:EbRegra')->getRegrasByEmpresa($id);
            break;

            case "categoria":
                $regras = $em->getRepository('ComprasBundle:EbRegra')->getRegrasByCategoria($id);
            break;

            case "segmento":
                $regras = $em->getRepository('ComprasBundle:EbRegra')->getRegrasBySegmento($id);

            break;
        }

        return array("regras" => $regras, "action" => $action);
    }

}
