<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ShowNoteTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_show(): void
    {
        $response = $this->get('/{notes}');
        $response->assertStatus(200);    
    }    

}
