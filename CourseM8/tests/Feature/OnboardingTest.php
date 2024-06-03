<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OnboardingTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_is_redirected_to_onboarding_if_not_completed()
    {
        $user = User::factory()->create(['onboarding_completed' => false]);

        $response = $this->actingAs($user)->get('/home');

        $response->assertRedirect('/onboarding');
    }

    public function test_user_can_complete_onboarding()
    {
        $user = User::factory()->create(['onboarding_completed' => false]);

        $response = $this->actingAs($user)->post('/onboarding', [
            'study_time' => 'Early Morning',
            'study_location' => 'Library',
        ]);

        $response->assertRedirect('/home');
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'onboarding_completed' => true,
        ]);
        $this->assertDatabaseHas('user_tags', [
            'user_id' => $user->id,
            // Check for the appropriate tag IDs based on your setup
        ]);
    }
}
