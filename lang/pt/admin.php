<?php

return [
    'resources' => [
        'work' => [
            'singular' => 'Publicação',
            'plural' => 'Publicações',
        ],
        'education' => [
            'singular' => 'Formação Acadêmica',
            'plural' => 'Formações e Titulações',
        ],
        'employment' => [
            'singular' => 'Atuação Profissional',
            'plural' => 'Histórico Profissional',
        ],
        'professional_activity' => [
            'singular' => 'Atividade Profissional',
            'plural' => 'Atividades Profissionais',
        ],
        'funding' => [
            'singular' => 'Financiamento',
            'plural' => 'Financiamentos e Bolsas',
        ],
        'external_link' => [
            'singular' => 'Link',
            'plural' => 'Links',
        ],
        'language' => [
            'singular' => 'Idioma',
            'plural' => 'Idiomas',
        ],
        'profile' => 'Perfil',
        'metadata' => 'Metadados',
    ],

    'sections' => [
        'core_seo' => 'SEO Principal',
        'core_seo_description' => 'Informações essenciais de identidade e motores de busca.',
        'social_presence' => 'Presença Social',
        'social_presence_description' => 'Gerencie como seu site aparece no LinkedIn, Twitter e WhatsApp.',
        'technical_config' => 'Configuração Técnica',
    ],

    'messages' => [
        'section_active' => 'Seção visível no site (Contém dados)',
        'section_inactive' => 'Seção oculta (Sem dados)',
        'resume_not_found' => 'Currículo não encontrado.',
    ],

    'fields' => [
        'abstract' => 'Resumo / Abstract',
        'academic_metadata' => 'Identificadores Acadêmicos (GEO)',
        'activity_type' => 'Tipo de Atividade',
        'agency' => 'Agência / Instituição (ex: CNPq, CAPES)',

        // --- Group: Aliases ---
        'aliases' => 'Nomes Alternativos / Pseudônimos',
        'aliases_placeholder' => 'Ex: Matiz, M. Madel',
        // ----------------------

        'attachments' => 'Anexos',
        'avatar_gif' => 'Avatar animado (GIF)',
        'avatar_jpeg' => 'Foto de Perfil (JPEG/PNG)',
        'avatar_og' => 'Imagem de Compartilhamento (OG Image)',
        'avatar_og_helper' => 'Tamanho recomendado: 1200x630px',
        'bio' => 'Biografia',
        'category' => 'Categoria',
        'change_language' => 'Alterar idioma',
        'city' => 'Cidade',
        'color' => 'Cor',
        'content' => 'Conteúdo',
        'country' => 'País',
        'created_at' => 'Data de criação',
        'currently' => 'Atualmente / Presente',
        'default_message' => 'Mensagem Padrão (WhatsApp)',
        'degree' => 'Titulação / Grau',
        'delete' => 'Excluir',
        'department' => 'Departamento',
        'description' => 'Descrição',
        'doi' => 'DOI',

        // --- Group: Download Resume ---
        'download_resume' => 'Curriculum Vitae (PDF)',
        'download_resume_helper' => 'Faça o upload do seu currículo oficial. Se deixado em branco, o site usará a função de impressão da página para gerar um PDF dinâmico.',
        // ------------------------------

        'edit' => 'Editar',
        'email' => 'E-mail',
        'end_date' => 'Data de término',

        // --- Group: Favicon ---
        'favicon' => 'Favicon (Ícone do site)',
        'favicon_helper' => 'O ícone que aparece na aba do navegador (recomendado 32x32px).',
        // ----------------------

        'first_name' => 'Nome',
        'funding_type' => 'Tipo de Financiamento',
        'hide_content' => 'Ocultar conteúdo',
        'icon' => 'Ícone',
        'identifier' => 'Identificador técnico',
        'id_link_value' => 'ID ou Link',
        'institution' => 'Instituição',
        'is_active' => 'Ativo',
        'is_whatsapp' => 'É um número de WhatsApp?',
        'keyword_1' => 'Palavra-chave 1',
        'keyword_2' => 'Palavra-chave 2',
        'keyword_3' => 'Palavra-chave 3',
        'keyword_4' => 'Palavra-chave 4',
        'keyword_5' => 'Palavra-chave 5',
        'keywords' => 'Palavras-chave',
        'label' => 'Rótulo / Nome',
        'language_name' => 'Idioma',
        'last_name' => 'Sobrenome',
        'name' => 'Nome da Seção',
        'order' => 'Ordem',
        'organization' => 'Organização',
        'phone' => 'Telefone',
        'platform_key' => 'Plataforma (ex: orcid, lattes)',
        'print' => 'Imprimir página',
        'profile_images' => 'Imagens de Perfil',
        'profile_picture_avatar' => 'Foto de Perfil Principal',
        'profile_picture_avatar_in_motion' => 'Foto de Perfil Animada',
        'property_key' => 'Propriedade (ex: og:type)',
        'property_value' => 'Conteúdo',
        'publication_date' => 'Data de publicação',
        'robots' => 'Indexação de Motores de Busca',
        'robots_private' => 'Privado (Não indexar)',
        'robots_public' => 'Público (Indexar e seguir)',
        'role' => 'Cargo / Função',
        'show_content' => 'Mostrar conteúdo',
        'social_metadata' => 'Meta Tags Sociais',
        'sort' => 'Ordenação',
        'start_date' => 'Data de início',
        'status' => 'Status',
        'subtitle' => 'Subtítulo (Exibição Pública)',

        // --- Group: Subtitle Variations ---
        'subtitle_variations' => 'Variações de Gênero do Título (Para IA e SEO)',
        'subtitle_variations_helper' => 'Estes termos NÃO aparecerão na tela. Eles serão injetados nos metadados para garantir que seu perfil seja encontrado independentemente da flexão de gênero pesquisada.',
        'subtitle_variations_placeholder' => 'Ex: Pesquisadora, Pesquisador',
        // ----------------------------------

        'theme_color' => 'Cor do Tema',
        'title' => 'Título',

        // --- Group: Title Suffix ---
        'title_suffix' => 'Sufixo do Título',
        'title_suffix_placeholder' => 'Ex: Portfólio Acadêmico',
        // ---------------------------

        'type' => 'Tipo',
        'updated_at' => 'Data de atualização',
        'url' => 'URL',
        'view' => 'Visualizar',
        'without_name' => 'Sem nome',
        'without_role' => 'Sem cargo',
    ],
];
