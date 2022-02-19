<?php

namespace Tests\Unit;

use Tests\TestCase;
use Database\Seeders\TodoListSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoListSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 指示是否应在每次测试之前运行默认播种器
     *
     * @var bool
     */
    protected $seed = true;

    /**
     * 每次测试前运行指定的播种器
     *
     * @var string
     */
    protected $seeder = TodoListSeeder::class;

    /**
     * 测试创建新订单
     *
     * @return void
     */
    public function test_todo_can_be_created()
    {
        // 執行指定Seed...
        $this->seed(TodoListSeeder::class);
        $this->assertDatabaseCount('todo_lists', 2);
    }

    /**
     * 運行前已先產生一筆數據，此方法用來驗證是否正確
     */
    public function test_count_table_is_1_limit()
    {
        $this->assertDatabaseCount('todo_lists', 1);
    }

    /**
     * 刪除〝id〞為〝1́〞的數據
     */
    public function test_find_1_to_delete()
    {
        $todoList = \App\Models\TodoList::find(1);
        $todoList->delete();
        $this->assertDeleted($todoList);
    }


}
