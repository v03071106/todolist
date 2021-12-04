<?php

namespace App\Services;

use App\Repositories\TodoListRepository;

class TodoListService
{
    private $repository;

    public function __construct(TodoListRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 取得所有資料
     *
     * @return void
     */
    public function getLists()
    {
        return $this->repository->getAlls();
    }

    /**
     * 建立要處理的動作
     *
     * @param array $input
     * @return void
     */
    public function createTodo(array $input)
    {
        return $this->repository->create($input);
    }

    /**
     * 刪除要處理的動作，可能還會包含其他處理
     *
     * @param integer $id
     * @return void
     */
    public function deleteTodo(int $id)
    {
        return $this->repository->delete($id);
    }
}
