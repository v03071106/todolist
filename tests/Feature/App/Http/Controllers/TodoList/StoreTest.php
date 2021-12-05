<?php

namespace Tests\Feature\App\Http\Controllers\TodoList;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * 測試 Request post 送出的資料是否符合
     *
     * @return void
     */
    public function test_post_status_is_302_and_redirect_index()
    {
        $response = $this->post(Route('store'), [
            'content' => 123
        ]);
        $response->assertStatus(302)
            ->assertRedirect(route('index'));
    }

    /**
     * 測試 Request post 送出的資料是否符合驗證
     *
     * @return void
     */
    public function test_post_request_params_content_length_validate()
    {
        $response = $this->post(route('store'), [
            'content' => ''
        ]);
        $response->assertSessionHasErrors(['content']);
    }
}
