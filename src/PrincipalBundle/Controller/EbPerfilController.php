<?php

namespace PrincipalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PrincipalBundle\Entity\EbPerfil;
use PrincipalBundle\Form\EbPerfilType;

/**
 * EbPerfil controller.
 *
 * @Route("/configuracao/perfil")
 */
class EbPerfilController extends Controller
{

    /**
     * Lists all EbPerfil entities.
     *
     * @Route("/", name="configuracao_perfil")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrincipalBundle:EbPerfil')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EbPerfil entity.
     *
     * @Route("/", name="configuracao_perfil_create")
     * @Method("POST")
     * @Template("PrincipalBundle:EbPerfil:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EbPerfil();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_perfil_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EbPerfil entity.
     *
     * @param EbPerfil $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EbPerfil $entity)
    {
        $form = $this->createForm(new EbPerfilType(), $entity, array(
            'action' => $this->generateUrl('configuracao_perfil_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EbPerfil entity.
     *
     * @Route("/new", name="configuracao_perfil_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EbPerfil();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EbPerfil entity.
     *
     * @Route("/{id}", name="configuracao_perfil_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbPerfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbPerfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EbPerfil entity.
     *
     * @Route("/{id}/edit", name="configuracao_perfil_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbPerfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbPerfil entity.');
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
    * Creates a form to edit a EbPerfil entity.
    *
    * @param EbPerfil $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EbPerfil $entity)
    {
        $form = $this->createForm(new EbPerfilType(), $entity, array(
            'action' => $this->generateUrl('configuracao_perfil_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EbPerfil entity.
     *
     * @Route("/{id}", name="configuracao_perfil_update")
     * @Method("PUT")
     * @Template("PrincipalBundle:EbPerfil:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbPerfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbPerfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_perfil_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EbPerfil entity.
     *
     * @Route("/{id}", name="configuracao_perfil_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrincipalBundle:EbPerfil')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EbPerfil entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configuracao_perfil'));
    }

    /**
     * Creates a form to delete a EbPerfil entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('configuracao_perfil_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
