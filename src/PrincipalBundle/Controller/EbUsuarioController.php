<?php

namespace PrincipalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PrincipalBundle\Entity\EbUsuario;
use PrincipalBundle\Form\EbUsuarioType;

/**
 * EbUsuario controller.
 *
 * @Route("/configuracao/usuario")
 */
class EbUsuarioController extends Controller
{

    /**
     * Lists all EbUsuario entities.
     *
     * @Route("/", name="configuracao_usuario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrincipalBundle:EbUsuario')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EbUsuario entity.
     *
     * @Route("/", name="configuracao_usuario_create")
     * @Method("POST")
     * @Template("PrincipalBundle:EbUsuario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EbUsuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_usuario_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EbUsuario entity.
     *
     * @param EbUsuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EbUsuario $entity)
    {
        $form = $this->createForm(new EbUsuarioType(), $entity, array(
            'action' => $this->generateUrl('configuracao_usuario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EbUsuario entity.
     *
     * @Route("/new", name="configuracao_usuario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EbUsuario();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EbUsuario entity.
     *
     * @Route("/{id}", name="configuracao_usuario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbUsuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EbUsuario entity.
     *
     * @Route("/{id}/edit", name="configuracao_usuario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbUsuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a EbUsuario entity.
    *
    * @param EbUsuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EbUsuario $entity)
    {
        $form = $this->createForm(new EbUsuarioType(), $entity, array(
            'action' => $this->generateUrl('configuracao_usuario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EbUsuario entity.
     *
     * @Route("/{id}", name="configuracao_usuario_update")
     * @Method("PUT")
     * @Template("PrincipalBundle:EbUsuario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbUsuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_usuario_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EbUsuario entity.
     *
     * @Route("/{id}", name="configuracao_usuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrincipalBundle:EbUsuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EbUsuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configuracao_usuario'));
    }

    /**
     * Creates a form to delete a EbUsuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('configuracao_usuario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
