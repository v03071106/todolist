<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\TodoListRepository;

class TodoListRepositoryTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * @var TodoListRepository
     */
    protected $todoList_repository;

    /**
     * 在每個 test case 開始前執行.
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->todoList_repository = app()->make(TodoListRepository::class);
    }

    /**
     * 測試成功建立
     */
    public function testCreateTodoListShouldSuccess()
    {
        $content = "測試內文";
        $this->todoList_repository->create(['content' => $content]);
        $this->assertDatabaseHas('todo_lists', [
            'content' => $content,
        ]);
    }
}
