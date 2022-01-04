<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Arts & Crafts', 'Biographies and Autobiographies', 'Comic Book or Graphic Novel', 'Detective and Mystery', 'Fantasy', 'Historical Fiction', 'Horror', 'Poetry', 'Romance', 'Science Fiction', 'Short Stories', 'Suspense and Thrillers'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
