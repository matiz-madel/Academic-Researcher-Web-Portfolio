<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => config('app.admin_email'),
                'name' => config('app.admin_name'),
                'password' => Hash::make(config('app.admin_password')),
            ]
        );

        $this->call([
            LanguageSeeder::class,
            LayoutSectionSeeder::class,
            PublicProfileSeeder::class,
            MetadataSeeder::class,
        ]);
    }
}
