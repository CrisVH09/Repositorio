<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_renders_the_form(): void
    {
        $this->get(route('contact.create'))
            ->assertOk()
            ->assertSee('Enviar mensaje');
    }

    public function test_visitor_can_send_a_contact_message(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Ana Pérez',
            'email' => 'ana@example.com',
            'subject' => 'Propuesta',
            'message' => 'Hola, me gustaría hablar sobre un proyecto.',
        ]);

        $response->assertRedirect(route('contact.create'))
            ->assertSessionHas('status');

        $this->assertDatabaseHas(ContactMessage::class, [
            'email' => 'ana@example.com',
            'subject' => 'Propuesta',
        ]);
    }

    public function test_contact_message_requires_valid_fields(): void
    {
        $this->post(route('contact.store'), [
            'name' => '',
            'email' => 'no-es-un-correo',
            'message' => 'Corto',
        ])->assertSessionHasErrors(['name', 'email', 'message']);

        $this->assertDatabaseCount(ContactMessage::class, 0);
    }

    public function test_contact_message_is_rejected_when_honeypot_is_filled(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Bot',
            'email' => 'bot@example.com',
            'message' => 'Mensaje automático de spam.',
            'website' => 'https://spam.example',
        ])->assertSessionHasErrors('website');

        $this->assertDatabaseCount(ContactMessage::class, 0);
    }
}
