<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use App\Models\TodoList;
use App\Services\TodoListService;
use App\Repositories\TodoListRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoListServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TodoListRepository
     */
    protected $todoList_repository_mock;

    /**
     * @var TodoListService
     */
    protected $todoList_service;

    /**
     * 在每個 test case 開始前執行.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->todoList_repository_mock = Mockery::mock(TodoListRepository::class);
        $this->todoList_service = new TodoListService($this->todoList_repository_mock);
    }

    /**
     * 測試 建立文章Service處理成功
     */
    public function testCreateTodoListSuccess()
    {
        $todoList = TodoList::factory()->create();
        $this->todoList_repository_mock
            ->shouldReceive('create')
            ->once()
            ->andReturn($todoList);
        $fake_input = [
            'content' => 'testCreatePostSuccess_測試內文',
        ];
        $actual_result = $this->todoList_service->createTodo($fake_input);
        $this->assertEquals($todoList->content, $actual_result['content']);
    }
}
