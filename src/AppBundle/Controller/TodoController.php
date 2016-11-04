<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Annotation\ApiName;
use AppBundle\Annotation\ApiGroup;
use AppBundle\Annotation\ApiVersion;
use AppBundle\Annotation\ApiParam;

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
     * @apiParam  {String} id Todo item ID.
     * @apiParam  {String} name name of the Todo item
     * @apiParam  {String} description description of the Todo item
     * @apiParam  {Date} deadline date of deadline for the Todo item
     * @apiParam  {Boolean} completed whether a Todo item is completed
     * 
     */
    public function putAction(Request $request, $id)
    {
        $responce = $this->get('app.todo_manager')->putTodo($id, $request->request->all());
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
     * @apiParam  {String} id Todo item ID.
     * @apiParam  {String} [name] name of the Todo item
     * @apiParam  {String} [description] description of the Todo item
     * @apiParam  {Date} [deadline] date of deadline for the Todo item
     * @apiParam  {Boolean} [completed] whether a Todo item is completed
     */
    public function patchAction(Request $request, $id)
    {
        $responce = $this->get('app.todo_manager')->updateTodo($id, $request->request->all());
        return new JsonResponse($responce);
    }
    
    /**
     * Deletes an existing todo entity by ID.
     *
     * @api {delete} /todo/{id} delete a todo
     * @apiName Delete Todo
     * @apiGroup Todo
     * @apiVersion 1.0.2
     *
     * @apiParam  {String} id  id of the Todo item
     */
    public function deleteAction($id)
    {
        $responce = $this->get('app.todo_manager')->deleteTodo($id);
        return new JsonResponse($responce);
    }
}
