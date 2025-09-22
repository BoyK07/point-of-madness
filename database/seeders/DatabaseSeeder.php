<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artist::create([
            'spotify_id' => '1YhRX1mRz6rzQofSyzlszi',
        ]);

        $this->call(LinktreeSeeder::class);
    }
}
