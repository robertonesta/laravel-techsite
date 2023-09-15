<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config("products_db");
        foreach ($products as $product)
        {
            $newProduct = new Product();
            $newProduct->name = $product['name'];
            $newProduct->slug = Str::slug($product['name']);
            $newProduct->price = $product["price"];
            $newProduct->image = $product["image"];
            $newProduct->description = $product["description"];
            $newProduct->save();
        }
    }
}
