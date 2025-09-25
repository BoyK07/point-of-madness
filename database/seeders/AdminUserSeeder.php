<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'info@pointofmadness.nl'],
            [
                'name' => 'Point of Madness',
                'password' => Hash::make('PointOfMadness'),
            ]
        );
    }
}
