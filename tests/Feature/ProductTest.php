<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Repository\ProductRepository;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed(CategorySeeder::class);
        $this->seed(ProductSeeder::class);
    }
    /**
     * @return void
     */
    public function test_fulltext()
    {
        $product = Product::first();
        $category = Category::first();
        $product->category()->save($category);

        $product->title = 'ahoj toto je test';
        $product->save();

        /** @var ProductRepository $repository */
        $repository = app(ProductRepository::class);
        $repository->applyFulltext('toto');
        $product = $repository->get();

        $this->assertEquals(1, $product->count());

        $repository = app(ProductRepository::class);
        $repository->applyFulltext('totone');
        $product = $repository->get();
        $this->assertEquals(0, $product->count());
    }
}
