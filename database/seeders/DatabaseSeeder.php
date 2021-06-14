<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0; $i<2; $i++) {
        //     $category = \App\Models\Category::factory()->create();

        //     for($z=0; $z<10; $z++) {
        //         $subCategory = \App\Models\SubCategory::factory()->create([
        //             'category_id' => $category->category_id
        //         ]);

        //         \App\Models\Product::factory(100)->create([
        //             'category_id' => $category->category_id,
        //             'sub_category_id' => $subCategory->sub_category_id,
        //             'product_is_exclusive' => ($i == 0) ? 1:0,
        //             'product_delivery_type' => ($i == 0) ? 'LANGSUNG':'TERJADWAL'
        //         ]);
        //     }

        //     \App\Models\BannerPrimary::factory(3)->create();

        //     \App\Models\BannerSecondary::factory(3)->create([
        //         'category_id' => $category->category_id
        //     ]);
        // }

        // $product = \App\Models\Product::all();

        // foreach($product as $item) {
        //     $unit = (mt_rand(0, 1) == 0) ? 'KG':'GR';
        //     $item->update([
        //         'product_unit' => $unit
        //     ]);
        // }

        // \App\Models\Search::factory(500)->create([
        //     'customer_id' => \App\Models\Customer::inRandomOrder()->first()->customer_id,
        // ]);

        // $search = \App\Models\Search::all();

        // foreach($search as $item) {
        //     $user = \App\Models\Customer::inRandomOrder()->first();
        //     $item->update([
        //         'customer_id' => $user->customer_id,
        //     ]);
        // }

        // \App\Models\ProductFavourite::factory(400)->create();

        $product = \App\Models\Product::inRandomOrder()->first();
        $qty = mt_rand(0, 10);

        \App\Models\CartItem::create([
            'customer_id' => '1qHy6ec31RRoxKHxSh7LvPS4OLy2',
            'product_id' => $product->product_id,
            'cart_item_id' => Str::uuid(),
            'cart_item_note' => 'Bla bla bla',
            'cart_item_qty' => $qty,
            'cart_item_price' => $product->product_final_price * $qty,
        ]);
    }
}
