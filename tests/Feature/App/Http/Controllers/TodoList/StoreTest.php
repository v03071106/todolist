<?php

namespace Tests\Feature\App\Http\Controllers\TodoList;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * 測試沒有輸入任何資料時，出現的驗證文字
     *
     * @return void
     */
    public function test_a_index_view_required_validate_message()
    {
        $view = $this->withViewErrors([
                'required' => 'The content field is required.'
            ])->view('errorMessage');

        $view->assertSee('The content field is required.');
    }

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
