<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Todo controller.
 *
 */
class TodoController extends Controller
{
    /**
     * Lists all todo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $todos = $em->getRepository('AppBundle:Todo')->findAll();

        return $this->render('todo/index.html.twig', array(
            'todos' => $todos,
        ));
    }

    /**
     * Creates a new todo entity.
     *
     */
    public function newAction(Request $request)
    {
        $todo = new Todo();
        $form = $this->createForm('AppBundle\Form\TodoType', $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($todo);
            $em->flush($todo);

            return $this->redirectToRoute('todo_show', array('id' => $todo->getId()));
        }

        return $this->render('todo/new.html.twig', array(
            'todo' => $todo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Puts todo entity.
     *
     */
    public function putAction(Todo $todo)
    {
        $deleteForm = $this->createDeleteForm($todo);

        return $this->render('todo/show.html.twig', array(
            'todo' => $todo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Patches an existing todo entity.
     *
     */
    public function patchAction(Request $request, Todo $todo)
    {
        $deleteForm = $this->createDeleteForm($todo);
        $editForm = $this->createForm('AppBundle\Form\TodoType', $todo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('todo_edit', array('id' => $todo->getId()));
        }

        return $this->render('todo/edit.html.twig', array(
            'todo' => $todo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a todo entity.
     * 
     * @api {post} /phone/item/update Update Item
     * @apiName Update
     * @apiGroup Item
     * @apiVersion 1.0.2
     *
     * @apiParam  {String} id item ID.
     * @apiParam  {String} name name (optional).
     * @apiParam  {String} description description (optional).
     * @apiParam  {String} price price (optional).
     * @apiParam  {Integer} productLink productLink (optional).
     * @apiParam  {String} returnPolicy return Policy (optional).
     * @apiParam  {Integer} count count (optional).
     * @apiParam  {Integer} likes likes (optional).
     * @apiParam  {String} sku sku (optional).
     * @apiParam  {Integer} shippingCost shipping Cost (optional).
     * @apiParam  {String} category category ID (optional).
     * @apiParam  {String} zip ZIP code (optional).
     * @apiParam  {Boolean} isOffered Offer ability (optional).
     * @apiParam  {String} lowPrice Low price for offer (optional).
     * @apiParam  {Array} imageFiles - array of files (optional).
     * @apiParam  {Array} images[{"id" : "123123", "order" : 1}] Images for update (optional).
     * @apiParam  {Array} videos[{"id" : "123123", "order" : 1}] videos for update (optional).
     * @apiParam  {Array} address Object {"first":"first", "last":"last"(optional), "street":"street", "state":"state", "city":"city", "zip":"zip", "street2":"street2", "phone":"phone"} for address (optional).
     * @apiParam  {Array} box {"weight_units": "LB","height": 12,"width": 10,"length": 8,"size_units": "IN","name":"custom"}, Standard box id (optional).
     * @apiParam  {Array} carriers Array of Carrier ID (optional).
     * @apiParam  {Array} typeDetails array of typeDetails Ids. (optional)
     */
    public function deleteAction(Request $request, Todo $todo)
    {
        $form = $this->createDeleteForm($todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($todo);
            $em->flush($todo);
        }

        return $this->redirectToRoute('todo_index');
    }
}
