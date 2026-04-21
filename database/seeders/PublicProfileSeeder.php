<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublicProfile;

class PublicProfileSeeder extends Seeder
{
    public function run(): void
    {
        PublicProfile::updateOrCreate(
            array('id' => 1),
            array(
                'first_name' => 'Matiz',
                'last_name' => 'Madel',
                'subtitle' => array(
                    'fr' => 'Chercheuse',
                    'pt' => 'Pesquisadora',
                    'en' => 'Researcher',
                    'es' => 'Investigadora'
                ),
            )
        );
    }
}
