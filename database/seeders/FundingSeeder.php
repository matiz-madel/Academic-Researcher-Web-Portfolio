<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fundings')->insert([
            [
                'id' => 1,
                'funding_type' => 'grant',
                'title' => '{"en": "Undergraduate Research Grant", "es": "Beca de Iniciación Científica", "fr": "Bourse d\'Initiation à la Recherche", "pt": "Iniciação Científica"}',
                'agency' => '{"en": "Federal University of Paraná (UFPR) – National Treasury, Brazil", "es": "Universidad Federal de Paraná (UFPR) – Tesoro Nacional, Brasil", "fr": "Université Fédérale du Paraná (UFPR) – Trésor National, Brésil", "pt": "UFPR – Tesouro Nacional, Brasil"}',
                'start_date' => '2024-08-01',
                'end_date' => '2025-07-31',
                'url' => '{"en": "https://siepe.ufpr.br/wp-content/uploads/2025/10/siepe-2025-v1-17out25.pdf#page=1519", "es": "https://siepe.ufpr.br/wp-content/uploads/2025/10/siepe-2025-v1-17out25.pdf#page=1519", "fr": "https://siepe.ufpr.br/wp-content/uploads/2025/10/siepe-2025-v1-17out25.pdf#page=1519", "pt": "https://siepe.ufpr.br/wp-content/uploads/2025/10/siepe-2025-v1-17out25.pdf#page=1519"}',
            ],
            [
                'id' => 3,
                'funding_type' => 'contract',
                'title' => '{"en": "Language Course Scholarship", "es": "Beca de Estudios", "fr": "Bourse d\'Études", "pt": "Bolsa de Estudos"}',
                'agency' => '{"en": "Franco-Brazilian Cultural Association of Curitiba, Brazil", "es": "Asociación de Cultura Franco-Brasileña de Curitiba, Brasil", "fr": "Association de Culture Franco-Brésilienne de Curitiba, Brésil", "pt": "Associação de Cultura Franco-Brasileira de Curitiba"}',
                'start_date' => '2025-07-01',
                'end_date' => '2026-06-30',
                'url' => '{"en": "https://afcuritiba.com.br/bolsas-sociais/", "es": "https://afcuritiba.com.br/bolsas-sociais/", "fr": "https://afcuritiba.com.br/bolsas-sociais/", "pt": "https://afcuritiba.com.br/bolsas-sociais/"}',
            ]
        ]);
    }
}
