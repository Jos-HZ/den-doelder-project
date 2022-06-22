<?php

namespace Tests\Unit;

use App\Models\Backlog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BacklogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function test_time_difference_errors_calculated_correctly()
    {
        // Create a backlog
        $backlog = Backlog::create([
            'id' => 1,
            'time' => '10:00:00',
            'date' => '2020-01-01',
            'description' => 'test',
            'category' => 'mechanical',
            'order_id' => 1,
        ]);

        $backlog->resolved_at = '10:20:00';
        $backlog->save();

        //test that time in between is calculated correctly
        $this->assertEquals(20, $backlog->timeDifference());

    }

    /**
     * @test
     *
     * @return void
     */
    public function test_time_difference_round_number_edge_case()
    {
        // Create a backlog
        $backlog = Backlog::create([
            'id' => 1,
            'time' => '10:00:00',
            'date' => '2020-01-01',
            'description' => 'test',
            'category' => 'mechanical',
            'order_id' => 1,
        ]);

        $backlog->resolved_at = '10:20:30';
        $backlog->save();

        // time difference is 20:30 minutes, it should be rounded to 21 minutes
        $this->assertEquals(21, $backlog->timeDifference());
    }

    /**
     * @test
     *
     * @return void
     */
    public function test_time_difference_round_number_round_down()
    {
        // Create a backlog
        $backlog = Backlog::create([
            'id' => 1,
            'time' => '10:00:00',
            'date' => '2020-01-01',
            'description' => 'test',
            'category' => 'mechanical',
            'order_id' => 1,
        ]);

        $backlog->resolved_at = '10:20:29';
        $backlog->save();

        // time difference is 20:29 minutes, it should be rounded to 20 minutes
        $this->assertEquals(20, $backlog->timeDifference());
    }

    /**
     * @test
     *
     * @return void
     */
    public function test_time_difference_round_number_round_up()
    {
        // Create a backlog
        $backlog = Backlog::create([
            'id' => 1,
            'time' => '10:00:00',
            'date' => '2020-01-01',
            'description' => 'test',
            'category' => 'mechanical',
            'order_id' => 1,
        ]);

        $backlog->resolved_at = '10:20:31';
        $backlog->save();

        // time difference is 20:31 minutes, it should be rounded to 21 minutes
        $this->assertEquals(21, $backlog->timeDifference());
    }
}
