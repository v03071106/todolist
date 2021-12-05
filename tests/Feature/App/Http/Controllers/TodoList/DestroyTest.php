<?php

namespace Tests\Feature\App\Http\Controllers\TodoList;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    /**
     * 刪除多筆不存在的資料
     *
     * @return void
     */
    public function test_delete_status_is_500()
    {
        $response = $this->get('/delete/9999999999');
        $response->assertStatus(500);
    }
}
