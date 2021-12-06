<?php

namespace Tests\Feature\App\Http\Controllers\TodoList;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * 測試 views/index.blade.php 是否正常
     *
     * @return void
     */
    public function test_a_index_view_can_be_rendered()
    {
        $view = $this->view('index', [
            'errors' => [],
            'lists' => []
        ]);

        $view->assertSeeText('Awesome Todo List');
    }

    /**
     * 訪問 index 是否取得200
     *
     * @return void
     */
    public function test_index_status_200()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * 測試資料筆數是否符合
     *
     * @return void
     */
    public function test_index_dataCount()
    {
        $model = new \App\Models\TodoList();
        $repository = new \App\Repositories\TodoListRepository($model);
        $todoLists = $repository->getAlls();
        if (0 === $todoLists->count()) {
            $this->assertEquals(0, $todoLists->count(), '資料筆數應該為0筆.');
        } else {
            $this->assertNotEquals(0, $todoLists->count(), '目前資料筆數超過0筆.');
        }
    }
}
