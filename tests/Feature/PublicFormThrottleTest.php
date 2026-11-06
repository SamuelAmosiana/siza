<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicFormThrottleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_form_is_limited_to_five_submissions_a_minute(): void
    {
        $this->assertSixthPostIsThrottled('/apply');
    }

    public function test_registration_is_limited_to_five_submissions_a_minute(): void
    {
        $this->assertSixthPostIsThrottled('/register');
    }

    private function assertSixthPostIsThrottled(string $uri): void
    {
        for ($attempt = 1; $attempt <= 5; $attempt++) {
            $this->post($uri)->assertSessionHasErrors();
        }

        $this->post($uri)->assertStatus(429);
    }
}
