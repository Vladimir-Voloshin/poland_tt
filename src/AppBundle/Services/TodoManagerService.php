<?php

namespace DunkBundle\Services;

use AppBundle\Entity\Todo;

class TodoManagerService
{
    const NAME_FIELD_DATA_MISSING        = 'The "NAME" field should not be empty';
    const DESCRIPTION_FIELD_DATA_MISSING = 'The "DESCRIPTION" field should not be empty';
    const DEADLINE_FIELD_DATA_MISSING    = 'The "DEADLINE" field should not be empty';
    
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    public function __construct($em)
    {
        $this->em = $em;
    }

    /**
     * @Param  \User $user current user
     * @Param  array $data user defined position's data
     *
     * @return array
     *
     */
    public function saveTodo($data = array())
    {
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
        
        if(empty($errors)){
            /** @var \AppBundle\Repository\TodoRepository $todoRepository */
            $todoRepository = $this->em->getRepository('AppBundle:Todo');
            /** @var \AppBundle\Entity\Todo $todo */
//            $todo = $todoRepository->find($data['todo-id']);
    
            $todo = new Position();
            $todo->setName($data['name']);
            $todo->setDescription($data['description']);
            $todo->setDeadline(new \DateTime($data['deadline']));
            $this->em->persist($todo);
            $this->em->flush();
        }
        
        return $todo->toJson();
    }
    
    /**
     * @Param  \User   $user current user
     * @Param  integer $page page number
     * @Param  integer $sorting position type possible values:
     *      1 - \Position::POSITION_STATUS_ACTIVE
     *      2 - \Position::POSITION_STATUS_CLOSED
     *      3 - \Position::POSITION_STATUS_MISSED
     *
     * @return mixed[]
     *
     */
    public function getPositionsByUser($userId, $sorting = Position::POSITION_STATUS_ACTIVE, $page = 1)
    {
        /** @var \DunkBundle\Repository\PositionRepository $positionRepository */
        $positionRepository = $this->em->getRepository('DunkBundle:Position');
        $query = $positionRepository->getPositionsQuery($userId, $sorting);

        /** @var \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination $pagination */
        $pagination = $this->paginator->paginate(
            $query,
            $page,
            self::MAX_POSITIONS_PER_PAGE
        );
        
        return $pagination;
    }
    
    /**
     * @Param  \User   $user current user
     *
     * @return mixed[]
     *
     */
    public function getPositionStatsByUser($userId)
    {
        /** @var \DunkBundle\Repository\PositionRepository $positionRepository */
        $positionRepository = $this->em->getRepository('DunkBundle:Position');
        $stats = $positionRepository->getUserStats($userId);
        dump($stats);die();
        return $stats;
    }
}
