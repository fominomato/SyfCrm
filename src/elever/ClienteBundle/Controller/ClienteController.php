<?php

namespace elever\ClienteBundle\Controller;

use PrincipalBundle\Entity\EbUsuarioRepository;
use elever\ClienteBundle\Entity\ClienteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use elever\ClienteBundle\Entity\Cliente;
use elever\ClienteBundle\Form\ClienteType;

/**
 * Cliente controller.
 *
 * @Route("/cliente")
 */
class ClienteController extends Controller
{

    /**
     * Lists all Cliente entities.
     *
     * @Route("/", name="cliente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClienteBundle:Cliente')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cliente entity.
     *
     * @Route("/cliente", name="cliente_create")
     * @Method("POST")
     * @Template("ClienteBundle:Cliente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cliente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


    /**
     * Displays a form to create a new Cliente entity.
     *
     * @Route("/new", name="cliente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
	    $em = $this->getDoctrine()->getManager();

	    /**
	     * @var EbUsuarioRepository $userList
	     */
	    $userList = $em->getRepository('PrincipalBundle:EbUsuario')->getUsuarios(array(), $this->getUser());
	    $clientList = $em->getRepository('ClienteBundle:Cliente')->getClientes(array(), $this->getUser());
	    $momentoList = $em->getRepository('ClienteBundle:Momento')->getMomentos(array(), $this->getUser());
	    $temperaturaList = $em->getRepository('ClienteBundle:Temperatura')->getTemperaturas(array(), $this->getUser());

	    return array("userList" => $userList, "clientList" => $clientList, "momentoList" => $momentoList, "temperaturaList" => $temperaturaList);
    }

    /**
     * Finds and displays a Cliente entity.
     *
     * @Route("/{id}", name="cliente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to delete a Cliente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
	private function createDeleteForm ($id)
    {
	    return $this->createFormBuilder()
		    ->setAction($this->generateUrl('cliente_delete', array('id' => $id)))
		    ->setMethod('DELETE')
		    ->add('submit', 'submit', array('label' => 'Delete'))
		    ->getForm();
    }

    /**
     * Displays a form to edit an existing Cliente entity.
     *
     * @Route("/{id}/edit", name="cliente_edit")
     * @Method("GET")
     * @Template()
     */
	public function editAction ($id)
    {
	    $em = $this->getDoctrine()->getManager();

	    $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

	    if (!$entity) {
		    throw $this->createNotFoundException('Unable to find Cliente entity.');
	    }

	    return array($entity);
    }

    /**
     * Edits an existing Cliente entity.
     *
     * @Route("/{id}", name="cliente_update")
     * @Method("PUT")
     * @Template("ClienteBundle:Cliente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cliente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Cliente entity.
     *
     * @param Cliente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
	private function createEditForm (Cliente $entity)
    {
	    $form = $this->createForm(new ClienteType(), $entity, array(
		    'action' => $this->generateUrl('cliente_update', array('id' => $entity->getId())),
		    'method' => 'PUT',
	    ));

	    $form->add('submit', 'submit', array('label' => 'Update'));

	    return $form;
    }

    /**
     * Deletes a Cliente entity.
     *
     * @Route("/{id}", name="cliente_delete")
     * @Method("DELETE")
     */
	public function deleteAction (Request $request, $id)
    {
	    $form = $this->createDeleteForm($id);
	    $form->handleRequest($request);

	    if ($form->isValid()) {
		    $em = $this->getDoctrine()->getManager();
		    $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

		    if (!$entity) {
			    throw $this->createNotFoundException('Unable to find Cliente entity.');
		    }

		    $em->remove($entity);
		    $em->flush();
	    }

	    return $this->redirect($this->generateUrl('cliente'));
    }
}
