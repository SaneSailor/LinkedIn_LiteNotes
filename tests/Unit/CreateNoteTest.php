<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CreateNoteTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_note(): void
    {
        $response = $this->get('/');
 
        $response->assertStatus(200);    }
}
