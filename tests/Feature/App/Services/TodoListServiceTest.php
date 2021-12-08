<?php

namespace Tests\Feature\App\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;
use App\Services\TodoListService;

class TodoListServiceTest extends TestCase
{
    public function test_something_can_be_mocked()
    {
        $this->instance(
            TodoListService::class,
            Mockery::mock(TodoListService::class, function (MockInterface $mock) {
                $mock->shouldReceive('getLists')->once();
            })
        );
    }
}
