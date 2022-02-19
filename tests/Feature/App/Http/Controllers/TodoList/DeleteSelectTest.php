<?php

namespace Tests\Feature\App\Http\Controllers\TodoList;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteSelectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_status_is_500()
    {
        $response = $this->delete(route('deleteSelect'), [
            'id' => [
                99999, 88888
            ]
        ]);
        $response->assertStatus(500);
    }
}
