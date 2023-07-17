<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TrashNoteTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_trash(): void
    {
        $response = $this->get('/trash');
 
        $response->assertStatus(200);    
    }
    
}
