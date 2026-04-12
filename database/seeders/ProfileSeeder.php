<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            array('id' => 1),
            array(
                'first_name' => 'Matiz',
                'last_name' => 'Madel',
                'subtitle' => array(
                    'fr' => 'Chercheuse en Philosophie du Droit',
                    'pt' => 'Pesquisadora em Filosofia do Direito',
                    'en' => 'Researcher in Philosophy of Law',
                    'es' => 'Investigadora en Filosofía del Derecho'
                ),
                'bio' => array(
                'fr' => 'Passionnée par les intersections entre le droit, la philosophie et les dynamiques de pouvoir...',
                'pt' => 'Apaixonada pelas intersecções entre o direito, a filosofia e as dinâmicas de poder...',
                'en' => 'Passionate about the intersections between law, philosophy, and power dynamics...',
                'es' => 'Apasionada por las intersecciones entre el derecho, la filosofía y las dinámicas de poder...'
                ),
                'aliases' => array('Laura Burkot Hungria', 'Laura Madel'),
                'avatar_jpeg' => '\public\storage\avatar.jpg',
            )
        );
    }
}
