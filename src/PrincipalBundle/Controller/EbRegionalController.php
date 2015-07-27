<?php

namespace PrincipalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PrincipalBundle\Entity\EbRegional;
use PrincipalBundle\Form\EbRegionalType;

/**
 * EbRegional controller.
 *
 * @Route("/configuracao/regional")
 */
class EbRegionalController extends Controller
{

    /**
     * Lists all EbRegional entities.
     *
     * @Route("/", name="configuracao_regional")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrincipalBundle:EbRegional')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EbRegional entity.
     *
     * @Route("/", name="configuracao_regional_create")
     * @Method("POST")
     * @Template("PrincipalBundle:EbRegional:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EbRegional();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_regional_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EbRegional entity.
     *
     * @param EbRegional $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EbRegional $entity)
    {
        $form = $this->createForm(new EbRegionalType(), $entity, array(
            'action' => $this->generateUrl('configuracao_regional_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EbRegional entity.
     *
     * @Route("/new", name="configuracao_regional_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EbRegional();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EbRegional entity.
     *
     * @Route("/{id}", name="configuracao_regional_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbRegional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbRegional entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EbRegional entity.
     *
     * @Route("/{id}/edit", name="configuracao_regional_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbRegional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbRegional entity.');
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
    * Creates a form to edit a EbRegional entity.
    *
    * @param EbRegional $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EbRegional $entity)
    {
        $form = $this->createForm(new EbRegionalType(), $entity, array(
            'action' => $this->generateUrl('configuracao_regional_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EbRegional entity.
     *
     * @Route("/{id}", name="configuracao_regional_update")
     * @Method("PUT")
     * @Template("PrincipalBundle:EbRegional:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrincipalBundle:EbRegional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EbRegional entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('configuracao_regional_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EbRegional entity.
     *
     * @Route("/{id}", name="configuracao_regional_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrincipalBundle:EbRegional')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EbRegional entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configuracao_regional'));
    }

    /**
     * Creates a form to delete a EbRegional entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('configuracao_regional_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
