<?php

namespace AppBundle\Services;

use AppBundle\Entity\Todo;

class TodoManagerService
{
    const NAME_FIELD_DATA_MISSING        = 'The "NAME" field should not be empty';
    const DESCRIPTION_FIELD_DATA_MISSING = 'The "DESCRIPTION" field should not be empty';
    const DEADLINE_FIELD_DATA_MISSING    = 'The "DEADLINE" field should not be empty';
    const TODO_NOT_FOUND                 = 'Todo item not found';
    
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    public function __construct($em)
    {
        $this->em = $em;
    }

    /**
     * create a new Todo
     * 
     * @Param  array $data user defined Todo's data
     * @Param  {String} id Todo item ID.
     *
     * @return array
     *
     */
    public function saveTodo($data = array())
    {
        $errors = $this->validateTodoData($data);
        if(empty($errors)){
            $todo = new Todo();
            $todo->setName($data['name']);
            $todo->setDescription($data['description']);
            $todo->setDeadline(new \DateTime($data['deadline']));
            $todo->setCompleted(false);
            $this->em->persist($todo);
            $this->em->flush();
        }
        
        return $todo->toJson();
    }
    
    /**
     * update a Todo item
     * 
     * @Param  {String} id Todo item ID.
     * @Param  array $data user defined Todo's data
     *
     * @return array
     *
     */
    public function putTodo($id, $data = array())
    {
        /** @var \AppBundle\Repository\TodoRepository $todoRepository */
        $todoRepository = $this->em->getRepository('AppBundle:Todo');
        /** @var \AppBundle\Entity\Todo $todo */
        $todo = $todoRepository->find($id);
        
        $errors = $this->validateTodoData($data);
        if(empty($errors)){
            if(empty($todo)){
                $todo = new Todo();
                $todo->setId($id);
            }
            $todo->setName($data['name']);
            $todo->setDescription($data['description']);
            $todo->setDeadline(new \DateTime($data['deadline']));
            $todo->setCompleted(false);
            $this->em->persist($todo);
            
            $metadata = $this->em->getClassMetaData(get_class($todo));
            $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
            $metadata->setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());
            
            $this->em->flush();
        }
        
        return $todo->toJson();
    }
    
    /**
     * validate user input
     *
     * @Param  array $data user defined Todo's data
     *
     * @return array
     *
     */
    private function validateTodoData($data){
        $errors = [];
        if(!isset($data['name']) || empty($data['name'])){
            array_push($errors, self::NAME_FIELD_DATA_MISSING);
        }
        if(!isset($data['description']) || empty($data['description'])){
            array_push($errors, self::DESCRIPTION_FIELD_DATA_MISSING);
        }
        if(!isset($data['deadline']) || empty($data['deadline'])){
            array_push($errors, self::DEADLINE_FIELD_DATA_MISSING);
        }
        
        return $errors;
    }
    
    /**
     * Update Todo by given id
     * 
     * @Param  {String} id Todo item ID.
     * @Param  array $data user defined Todo's data
     *
     * @return array
     *
     */
    public function updateTodo($id, $data = array())
    {
        /** @var \AppBundle\Repository\TodoRepository $todoRepository */
        $todoRepository = $this->em->getRepository('AppBundle:Todo');
        /** @var \AppBundle\Entity\Todo $todo */
        $todo = $todoRepository->find($id);
        
        if(empty($todo)){
            return array(
                'error' => self::TODO_NOT_FOUND
            );
        }
    
        if(isset($data['name']) || !empty($data['name'])){
            $todo->setName($data['name']);
        }
        if(isset($data['description']) || !empty($data['description'])){
            $todo->setDescription($data['description']);
        }
        if(isset($data['deadline']) || !empty($data['deadline'])){
            $todo->setDeadline(new \DateTime($data['deadline']));
        }
        if(isset($data['completed']) || !empty($data['completed'])){
            $todo->setCompleted(boolval($data['completed']));
        }
        
        
        $this->em->persist($todo);
        $this->em->flush();
        
        return $todo->toJson();
    }
    
    /**
     * Delete Todo by given id
     * 
     * @Param  {String} id Todo item ID.
     * @Param  array $data user defined Todo's data
     *
     * @return array
     *
     */
    public function deleteTodo($id)
    {
        /** @var \AppBundle\Repository\TodoRepository $todoRepository */
        $todoRepository = $this->em->getRepository('AppBundle:Todo');
        /** @var \AppBundle\Entity\Todo $todo */
        $todo = $todoRepository->find($id);
        
        if(empty($todo)){
            return array(
                'error' => self::TODO_NOT_FOUND
            );
        }
        
        $this->em->remove($todo);
        $this->em->flush();
        
        return array(
            'result' => true
        );
    }
}
