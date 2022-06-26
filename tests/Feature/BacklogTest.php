<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BacklogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the index route can be accessed.
     *
     * @return void
     */
    public function test_index_route()
    {
        $response = $this->get('/backlog');

        $response->assertStatus(200);
    }

    /**
     * Test if the backlog can be created.
     *
     * @return void
     */
    public function test_that_a_backlog_is_created()
    {
        // Arrange
        $route = route('backlog.store');
        $requestBody = [
            'time' => '13:00:00',
            'date' => '2020-01-01',
            'description' => 'description test',
            'category' => 'mechanical',
            'order_id' => 1,
        ];

        // Act
        $response = $this->post($route,$requestBody);

        // Then
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseCount('backlogs', 1);
        $this->assertDatabaseHas('backlogs', [
            'description' => 'description test'
        ]);
    }


    /**
     * Test if the backlog is not created when you don't send the order_id.
     *
     * @return void
     */
    public function test_that_a_backlog_is_not_created_without_order_id()
    {
        // Arrange
        $route = route('backlog.store');
        $requestBody = [
            'time' => '13:00:00',
            'date' => '2020-01-01',
            'description' => 'description test',
            'category' => 'test',
        ];

        // Act
        $response = $this->post($route,$requestBody);

        // Then
        $response->assertStatus(302);
        $response->assertSessionHasErrors();

        $this->assertDatabaseCount('backlogs', 0);
    }
}
