<?php

namespace Tests\Feature;

use App\User;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testBasicTest()
    {
        $response = $this->get('/' . app()->getLocale());

        $response->assertStatus(200);
    }

    /** @test */
    public function a_task_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/tasks/' . app()->getLocale(), [
            'title' => 'new title'
        ]);
        if (Auth::user()) {
            $response->assertCount(1, Task::all());
        }
        $response->assertStatus(302);
    }

    /** @test */

    public function a_title_is_required()
    {
        $response = $this->post('/tasks/' . app()->getLocale(), [
            'title' => ''
        ]);
        if (Auth::user()) {
            $response->assertSessionHasErrors('title');
        }
        $response->assertStatus(302);

    }
}
