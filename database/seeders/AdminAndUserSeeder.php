<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role_id' => Role::where('name', 'admin')->first()->id,
            'password' => Hash::make('12345678'),
            'is_active' => true,
            'email_verified_at' => Carbon::now(),
        ]);

        User::factory()->count(50)->create();

    }
}
