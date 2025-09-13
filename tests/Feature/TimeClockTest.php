<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimeClockTest extends TestCase
{
    use RefreshDatabase;

    public function testShouldSaveTimeClock(): void
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/time-clock');

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'user_id',
            'created_at',
            'updated_at',
        ]);
        $this->assertDatabaseHas('time_clocks', [
            'user_id' => $user->id,
        ]);
    }
}
