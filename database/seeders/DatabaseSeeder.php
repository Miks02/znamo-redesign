<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Milan',
            'last_name' => 'Nikolić',
            'password' => bcrypt('miki3112002'),
            'email' => 'mikac.n02@gmail.com',
            'phone_number' => '066 546 75 85',
            'username' => "mixx02",
            'is_admin' => true,
        ]);

        
    }
}
