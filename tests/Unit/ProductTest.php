<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_example()
    {
        // on test si le seeding de 2 produits est bien passé
        $this->assertEquals(2,Product::all()->count());
        $Product = new Product();
        $Product->name = 'test';
        $Product->price=20;
        $Product->description = 'test test test';
        $Product->mark_id=2;
        $Product->save();
        $this->assertEquals(3,Product::all()->count());
        Product::find(3)->delete();
        $this->assertEquals(2,Product::all()->count());


    }
}
