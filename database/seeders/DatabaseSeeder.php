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
        Artist::firstOrCreate([
            'spotify_id' => '1YhRX1mRz6rzQofSyzlszi',
        ]);

        $this->call([
            AdminSeeder::class,
            SsotContentSeeder::class,
        ]);
    }
}
