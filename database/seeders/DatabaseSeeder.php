<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<2; $i++) {
            $category = \App\Models\Category::factory()->create();

            for($z=0; $z<10; $z++) {
                $subCategory = \App\Models\SubCategory::factory()->create([
                    'category_id' => $category->category_id
                ]);

                \App\Models\Product::factory(100)->create([
                    'category_id' => $category->category_id,
                    'sub_category_id' => $subCategory->sub_category_id,
                    'product_is_exclusive' => ($i == 0) ? 1:0,
                    'product_delivery_type' => ($i == 0) ? 'LANGSUNG':'TERJADWAL'
                ]);
            }

            \App\Models\BannerPrimary::factory(3)->create();

            \App\Models\BannerSecondary::factory(3)->create([
                'category_id' => $category->category_id
            ]);
        }
    }
}
