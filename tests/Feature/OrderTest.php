<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * When a new order is added to the system, the order status is set to 'pending'
     * @return void
     */
    public function test_that_order_status_has_default_pending()
    {
        // Arrange
        $route = route('orders.store');
        $requestBody = [
            'id' => 1,
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
        ];

        // Act
        $response = $this->post($route, $requestBody);

        // Then
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseHas('orders', [
            'status' => 'pending'
        ]);
    }

    /**
     * When the order is started, the order status is set to 'conversion'
     * @return void
     */
    public function test_that_order_status_has_conversion_when_started_conversion()
    {
        // Arrange
        $route = route('orders.store');
        $requestBody = [
            'id' => 1,
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
        ];

        // Act
        $response = $this->post($route, $requestBody);

        // Then
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $response = $this->get(route('orders.conversion', 1));

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseHas('orders', [
            'status' => 'conversion'
        ]);
    }

    /**
     * When the production is started, the order status is set to 'production'
     * @return void
     */
    public function test_that_order_status_has_production_when_started_production()
    {
        // Arrange
        $route = route('orders.store');
        $requestBody = [
            'id' => 1,
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
        ];

        // Act
        $response = $this->post($route, $requestBody);

        // Then
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $response = $this->get(route('orders.conversion', 1));
        $response = $this->get(route('orders.start', 1));

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseHas('orders', [
            'status' => 'production'
        ]);
    }

    /**
     * When the production is finished, the order status is set to 'completed'
     * @return void
     */
    public function test_that_order_status_has_completed_when_finished()
    {
        // Arrange
        $route = route('orders.store');
        $requestBody = [
            'id' => 1,
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
        ];

        // Act
        $response = $this->post($route, $requestBody);

        // Then
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $response = $this->get(route('orders.conversion', 1));
        $response = $this->get(route('orders.start', 1));
        $response = $this->get(route('orders.end', 1));

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseHas('orders', [
            'status' => 'completed'
        ]);
    }

    /**
     * When backlog is created error_status is set to TRUE
     * @return void
     */
    public function test_that_error_status_set_to_true_when_error_occurred()
    {
        // Arrange
        $route = route('orders.store');
        $requestBody = [
            'id' => 1,
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
        ];

        // Act
        $response = $this->post($route, $requestBody);

        // Arrange backlog
        $route = route('backlog.store');
        $backlogRequestBody = [
            'time' => '13:00:00',
            'date' => '2020-01-01',
            'description' => 'description test',
            'category' => 'test',
            'order_id' => 1
        ];

        $response = $this->post(route('backlog.store', $backlogRequestBody));

        // Then
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseHas('orders', [
            'error_status' => 1
        ]);
    }

}
