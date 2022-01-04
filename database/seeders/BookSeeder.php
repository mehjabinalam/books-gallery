<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_path = 'public/assets/frontend/img/150x226/';
        $pdf_path = 'public/assets/frontend/pdf/index.pdf';
        $images = File::files($image_path);
        $categories = Category::all();
        $user = User::where('email', 'admin@example.com')->first();
        $faker = Factory::create();

        foreach ($categories as $category) {
            foreach ($images as $key => $image) {
                $time = (time() + $key) * $category->id;
                $data['name'] = $faker->sentence($nbWords = 6, $variableNbWords = true);
                $data['slug'] = Str::slug($data['name']);

                $cover_image_name = "{$data['slug']}-{$time}.jpg";
                $pdf_name = "{$data['slug']}-{$time}.pdf";

                $data['description'] = $faker->text(1000);
                $data['status'] = rand(0,1);
                $data['cover_image'] = $cover_image_name;
                $data['pdf_file'] = $pdf_name;
                $data['category_id'] = $category->id;
                $user->books()->create($data);
                File::copy($image_path . $image->getBasename(), 'public/uploads/' . Book::COVER_IMAGE_PATH . "/{$cover_image_name}");
                File::copy($pdf_path, 'public/uploads/' . Book::PDF_PATH . "/{$pdf_name}");
            }
        }
    }
}
