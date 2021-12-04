<?php

namespace App\Repositories;

use App\Models\TodoList;

class TodoListRepository
{
    private $model;

    public function __construct(TodoList $model)
    {
        $this->model = $model;
    }

    /**
     * 排序後再取出所有資料
     *
     * @return Collect
     */
    public function getAlls()
    {
        return $this->model->orderByDesc('created_at')->get();
    }

    /**
     * 建立
     *
     * @param array $input
     * @return bool
     */
    public function create(array $input)
    {
        return $this->model->create($input);
    }

    /**
     * 刪除
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $data = $this->model->find($id);
        return $data->delete();
    }
}
