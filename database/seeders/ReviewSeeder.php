<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::get(['id', 'name', 'role_id'])->pluck('id')->toArray();
        $books = Book::get(['id','name']);
        $faker = Factory::create();

        foreach ($books as $book) {
            for($i = 0; $i < rand(0,10); $i++) {
                $book->reviews()->create([
                    'user_id' => $userIds[rand(0, count($userIds) - 1)],
                    'review' => $faker->text(250),
                ]);
            }
        }
    }
}
