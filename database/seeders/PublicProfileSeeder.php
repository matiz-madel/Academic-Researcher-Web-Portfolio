<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublicProfile;

class PublicProfileSeeder extends Seeder
{
    public function run(): void
    {
        PublicProfile::updateOrCreate(
            ['id' => 1],
            [
                'first_name' => 'Matiz',
                'last_name' => 'Madel',
                'email' => 'matiz@madel.me',
                'phone' => '+55 41 9 9100-3000',
                'is_whatsapp' => true,
                'resume_pdf' => [],
                'aliases' => [
                    "L. Madel", "MADEL, Laura", "MADEL, L.", "L. B. H. Madel",
                    "MADEL, Laura Burkot Hungria", "Laura Burkot Hungria Madel",
                    "MADEL, L. B. H.", "M. Madel", "MADEL, M.", "MADEL, Matiz",
                    "Matiz Madel®"
                ],
                'subtitle' => array(
                    'fr' => 'Recherche Juridique & Développement Logiciel',
                    'pt' => 'Pesquisa Jurídica & Desenvolvimento de Software',
                    'en' => 'Legal Research & Software Development',
                    'es' => 'Investigación Jurídica & Desarrollo de Software'
                ),
                'subtitle_variations' => [
                    'en' => [
                        'Researcher', 'Investigator', 'Developer', 'Software Developer',
                        'Software Engineer', 'Programmer', 'Scientist', 'Legal Researcher',
                        'Law Researcher', 'Jurist', 'Legal Scholar', 'Tech Lawyer'
                    ],
                    'es' => [
                        'Investigador', 'Investigadora', 'Investigadore', 'Investigador(a)',
                        'Investigador/a', 'Investigador@', 'Investigadorx', 'Persona Investigadora',
                        'Desarrollador', 'Desarrolladora', 'Desarrolladore', 'Desarrollador(a)',
                        'Desarrollador/a', 'Desarrollador@', 'Desarrolladorx', 'Persona Desarrolladora',
                        'Científico', 'Científica', 'Científicx',
                        'Jurista', 'Investigador Jurídico', 'Investigadora Jurídica', 'Investigadore Jurídique',
                        'Programador', 'Programadora', 'Programadore', 'Ingeniería de Software'
                    ],
                    'fr' => [
                        'Chercheur', 'Chercheuse', 'Chercheur.e', 'Chercheur(euse)', 'Chercheur.euse',
                        'Chercheur·euse', 'Chercheur(se)', 'Investigatrice', 'Investigateur',
                        'Développeur', 'Développeuse', 'Développeur.euse', 'Développeur(se)',
                        'Développeur·euse', 'Scientifique', 'Juriste', 'Chercheur en droit',
                        'Programmeur', 'Programmeuse', 'Ingénieur logiciel', 'Ingénieur.e logiciel'
                    ],
                    'pt' => [
                        'Pesquisador', 'Pesquisadora', 'Pesquisadore', 'Pesquisador(a)',
                        'Pesquisador(e)', 'Pesquisador(a/e)', 'Pesquisador/a', 'Pessoa Pesquisadora',
                        'Desenvolvedor', 'Desenvolvedora', 'Desenvolvedore', 'Desenvolvedor(a)',
                        'Desenvolvedor(e)', 'Desenvolvedor/a', 'Pessoa Desenvolvedora',
                        'Investigador', 'Investigadora', 'Investigador(a)', 'Cientista',
                        'Jurista', 'Pesquisador Jurídico', 'Pesquisadora Jurídica', 'Pesquisadore Jurídique',
                        'Programador', 'Programadora', 'Programadore', 'Pessoa Programadora', 'Engenharia de Software'
                    ]
                ],
                'bio' => [
                    'en' => 'Law student at the Universidade Federal do Paraná (UFPR) and administration technician from IFPR. Bridging a background in software development with academic legal research. Core research areas focus on constitutional law, human rights, philosophy of law, and public policies, accompanied by a strong interest in epistemology and ethics.',
                    'es' => 'Estudiante de Derecho en la Universidade Federal do Paraná (UFPR) y técnica en administración por el IFPR. Con experiencia en el desarrollo de software, integra conocimientos tecnológicos con la investigación académica jurídica. Las líneas de investigación se centran en el derecho constitucional, los derechos humanos, la filosofía del derecho y las políticas públicas, con un profundo interés en la epistemología, y la ética.',
                    'fr' => "Étudiante en droit à l'Universidade Federal do Paraná (UFPR) et technicienne en administration diplômée de l'IFPR. Dotée d'une expérience en développement de logiciels, cette expertise technique vient enrichir un parcours académique juridique. Les recherches se concentrent sur le droit constitutionnel, les droits humains, la philosophie du droit et les politiques publiques, avec un intérêt marqué pour l'épistémologie, l'éthique et l'accès à l'information.",
                    'pt' => 'Estudante de Direito na Universidade Federal do Paraná (UFPR) e técnica em administração pelo Instituto Federal do Paraná (IFPR). Com experiência em desenvolvimento de software, busca aliar o conhecimento tecnológico à pesquisa acadêmica jurídica. As áreas de pesquisa e atuação concentram-se em direito constitucional, direitos humanos, filosofia do direito e políticas públicas, com profundo interesse no estudo de epistemologia, e ética.',
                ],
                'default_message' => [
                    'en' => 'Hello! I came across your portfolio on your website and would like to get in touch.',
                    'es' => '¡Hola! He visto tu portafolio en la página web y me gustaría ponerme en contacto contigo.',
                    'fr' => "Bonjour ! J'ai consulté votre portfolio en ligne et je souhaiterais vous contacter.",
                    'pt' => 'Olá! Acessei o seu site e gostaria de entrar em contato.',
                ],
            ]
        );
    }
}
