<?php

namespace Database\Seeders;

use App\Models\Jabatan;
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
        Jabatan::factory(10)->create();
        // $this->call([
        //     JabatanSeeder::class,
        // PostSeeder::class,
        // CommentSeeder::class,
        // ]);
    }
}
