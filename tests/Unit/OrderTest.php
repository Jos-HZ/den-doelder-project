<?php

namespace Tests\Unit;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     * @return void
     */
    public function test_conversion_time_is_calculated_correctly()
    {
        // Create a backlog
        $order = Order::create([
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
            'start_time' => '10:00:00',
            'conversion_time' => '10:20:00',
        ]);

        //test that time in between is calculated correctly
        $this->assertEquals(20, $order->conversionTime());
    }

    /**
     *
     * @return void
     */
    public function test_conversion_time_round_number_edge_case()
    {
        // Create a backlog
        $order = Order::create([
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
            'start_time' => '10:00:00',
            'conversion_time' => '10:20:30',
        ]);

        // test that time in between is calculated correctly
        // time difference is 20:30 minutes, it should be rounded to 21 minutes
        $this->assertEquals(21, $order->conversionTime());
    }

    /**
     *
     * @return void
     */
    public function test_conversion_time_round_number_round_down()
    {
        // Create a backlog
        $order = Order::create([
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
            'start_time' => '10:00:00',
            'conversion_time' => '10:20:29',
        ]);

        // test that time in between is calculated correctly
        // time difference is 20:29 minutes, it should be rounded to 20 minutes
        $this->assertEquals(20, $order->conversionTime());
    }

    /**
     *
     * @return void
     */
    public function test_conversion_time_round_number_round_up()
    {
        // Create a backlog
        $order = Order::create([
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
            'start_time' => '10:00:00',
            'conversion_time' => '10:20:31',
        ]);

        // test that time in between is calculated correctly
        // time difference is 20:31 minutes, it should be rounded to 21 minutes
        $this->assertEquals(21, $order->conversionTime());
    }

    /**
     *
     * @return void
     */
    public function test_production_time_is_calculated_correctly()
    {
        // Create a backlog
        $order = Order::create([
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
            'start_time' => '10:00:00',
        ]);

        $order->end_time = '10:30:00';
        $order->save();

        //test that time in between is calculated correctly
        $this->assertEquals(30, $order->productionTime());
    }

    /**
     *
     * @return void
     */
    public function test_production_time_round_number_edge_case()
    {
        // Create a backlog
        $order = Order::create([
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
            'start_time' => '10:00:00',
        ]);

        $order->end_time = '10:30:30';
        $order->save();

        //test that time in between is calculated correctly
        // time difference is 30:30 minutes, it should be rounded to 31 minutes
        $this->assertEquals(31, $order->productionTime());
    }

    /**
 *
 * @return void
 */
    public function test_production_time_round_down()
    {
        // Create a backlog
        $order = Order::create([
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
            'start_time' => '10:00:00',
        ]);

        $order->end_time = '10:30:29';
        $order->save();

        //test that time in between is calculated correctly
        // time difference is 30:29 minutes, it should be rounded to 30 minutes
        $this->assertEquals(30, $order->productionTime());
    }

    /**
     *
     * @return void
     */
    public function test_production_time_round_up()
    {
        // Create a backlog
        $order = Order::create([
            'ordernumber' => '12345',
            'pallettype' => 'pallet',
            'palletnumber' => '12345',
            'notes' => 'notes test',
            'production_line_id' => 1,
            'error_status' => 0,
            'production_done' => 0,
            'start_time' => '10:00:00',
        ]);

        $order->end_time = '10:30:31';
        $order->save();

        //test that time in between is calculated correctly
        // time difference is 30:31 minutes, it should be rounded to 31 minutes
        $this->assertEquals(31, $order->productionTime());
    }
}
