<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Annotation\ApiName;
use AppBundle\Annotation\ApiGroup;
use AppBundle\Annotation\ApiVersion;

/**
 * Todo controller.
 * 
 */
class TodoController extends Controller
{
    /**
     * Lists all todo entities.
     *
     * @api {get} /todo/ gets all the Todo items listed
     * @apiName List Todos
     * @apiGroup Todo
     * @apiVersion 1.0.2
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $todos = $em->getRepository('AppBundle:Todo')->findAll();
        
        return new JsonResponse($todos);
    }
    
    /**
     * Creates new todo
     *
     * @api {post} /todo/ post a new todo
     * @apiName New Todo
     * @apiGroup Todo
     * @apiVersion 1.0.2
     *
     * @apiParam  {String} name name of the Todo item
     * @apiParam  {String} description description of the Todo item
     * @apiParam  {Date} deadline date of deadline for the Todo item
     */
    public function newAction(Request $request)
    {
        $responce = $this->get('app.todo_manager')->saveTodo($request->request->all());
        return new JsonResponse($responce);
    }

    /**
     * Puts todo entity.
     *
     * @api {put} /todo/{id} put todo
     * @apiName Put a Todo
     * @apiGroup Todo
     * @apiVersion 1.0.2
     *
     * @apiParam  {String} id item ID.
     * @apiParam  {String} name name of the Todo item
     * @apiParam  {String} description description of the Todo item
     * @apiParam  {Date} deadline date of deadline for the Todo item
     * @apiParam  {Boolean} completed whether a Todo item is completed
     * 
     */
    public function putAction(Request $request, $todoId)
    {
        $responce = $this->get('dunk.position_manager')->saveTodo($todoId, $request->request->all());
        return new JsonResponse($responce);
    }

    /**
     * Patches an existing todo entity.
     *
     * @api {patch} /todo/{id} patch a todo
     * @apiName Patch Todo
     * @apiGroup Todo
     * @apiVersion 1.0.2
     *
     * @apiParam  {String} id item ID.
     * @apiParam  {String} [name] name of the Todo item
     * @apiParam  {String} [description] description of the Todo item
     * @apiParam  {Date} [deadline] date of deadline for the Todo item
     * @apiParam  {Boolean} [completed] whether a Todo item is completed
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
     * Patches an existing todo entity.
     *
     * @api {delete} /todo/{id} delete a todo
     * @apiName Delete Todo
     * @apiGroup Todo
     * @apiVersion 1.0.2
     *
     * @apiParam  {String} id of the Todo item
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
