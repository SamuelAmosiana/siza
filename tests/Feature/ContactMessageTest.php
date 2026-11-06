<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_contact_message_is_saved(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Test Student',
            'email' => 'student@example.com',
            'subject' => 'Admissions',
            'message' => 'When do applications open?',
        ])->assertSessionHasNoErrors()->assertRedirect();

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'student@example.com',
            'subject' => 'Admissions',
            'message' => 'When do applications open?',
        ]);
    }

    public function test_the_subject_is_optional(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Test Student',
            'email' => 'student@example.com',
            'message' => 'Sent from the home page form.',
        ])->assertSessionHasNoErrors();

        $this->assertDatabaseHas('contact_messages', [
            'message' => 'Sent from the home page form.',
            'subject' => null,
        ]);
    }

    public function test_an_invalid_message_is_not_saved(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Test Student',
            'email' => 'not-an-email',
            'message' => '',
        ])->assertSessionHasErrors(['email', 'message']);

        $this->assertDatabaseCount('contact_messages', 0);
    }
}
