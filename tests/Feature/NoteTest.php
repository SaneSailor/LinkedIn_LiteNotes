<?php

namespace Tests\Feature;

use App\Http\Controllers\NoteController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NoteTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use NoteController;
    /**
     * A basic feature test example.
     */
    public function test_note(): void
    {
        $note = NoteController::create()->view();

        $response = $this
            ->actingAs($note)
            ->patch('/{note}', [
                'title' => 'Test Title',
                'text' => 'Testing text',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/note');

        $note->refresh();

        $this->assertSame('Test Title', $note->title);
        $this->assertSame('Testing text', $note->text);
    }
}
