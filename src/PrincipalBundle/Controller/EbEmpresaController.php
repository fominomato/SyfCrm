<?php

namespace PrincipalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PrincipalBundle\Entity\EbEmpresa;
use PrincipalBundle\Form\EbEmpresaType;

/**
 * EbEmpresa controller.
 *
 * @Route("/configuracao/empresa")
 */
class EbEmpresaController extends Controller
{

    /**
     * Lists all EbEmpresa entities.
     *
     * @Route("/", name="configuracao_empresa")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrincipalBundle:EbEmpresa')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EbEmpresa entity.
     *
     * @Route("/", name="configuracao_empresa_create")
     * @Method("POST")
     * @Template("PrincipalBundle:EbEmpresa:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EbEmpresa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_empresa_show', array('id' => $entity->getIdEmpresa())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EbEmpresa entity.
     *
     * @param EbEmpresa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EbEmpresa $entity)
    {
        $form = $this->createForm(new EbEmpresaType(), $entity, array(
            'action' => $this->generateUrl('configuracao_empresa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EbEmpresa entity.
     *
     * @Route("/new", name="configuracao_empresa_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EbEmpresa();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EbEmpresa entity.
     *
     * @Route("/{id}", name="configuracao_empresa_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbEmpresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbEmpresa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EbEmpresa entity.
     *
     * @Route("/{id}/edit", name="configuracao_empresa_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbEmpresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbEmpresa entity.');
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
    * Creates a form to edit a EbEmpresa entity.
    *
    * @param EbEmpresa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EbEmpresa $entity)
    {
        $form = $this->createForm(new EbEmpresaType(), $entity, array(
            'action' => $this->generateUrl('configuracao_empresa_update', array('id' => $entity->getIdEmpresa())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EbEmpresa entity.
     *
     * @Route("/{id}", name="configuracao_empresa_update")
     * @Method("PUT")
     * @Template("PrincipalBundle:EbEmpresa:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbEmpresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbEmpresa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_empresa_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EbEmpresa entity.
     *
     * @Route("/{id}", name="configuracao_empresa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrincipalBundle:EbEmpresa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EbEmpresa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configuracao_empresa'));
    }

    /**
     * Creates a form to delete a EbEmpresa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('configuracao_empresa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
