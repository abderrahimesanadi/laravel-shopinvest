<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Mark;

class MarkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // on test si le seeding de 2 marques est bien passé
        $this->assertEquals(2,Mark::all()->count());
        $mark = new Mark();
        $mark->name = 'pull and bear';
        $mark->save();
        $this->assertEquals(3,Mark::all()->count());
        $mark::find(3)->delete();
        $this->assertEquals(2,Mark::all()->count());


    }
}
