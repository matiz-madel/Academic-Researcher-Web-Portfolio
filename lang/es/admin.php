<?php

return [
    'resources' => [
        'work' => [
            'singular' => 'Publicación',
            'plural' => 'Publicaciones',
        ],
        'education' => [
            'singular' => 'Educación',
            'plural' => 'Educación y Títulos',
        ],
        'employment' => [
            'singular' => 'Empleo',
            'plural' => 'Historial de Empleo',
        ],
        'professional_activity' => [
            'singular' => 'Actividad Profesional',
            'plural' => 'Actividades Profesionales',
        ],
        'funding' => [
            'singular' => 'Financiamiento',
            'plural' => 'Financiamientos y Becas',
        ],
        'external_link' => [
            'singular' => 'Enlace',
            'plural' => 'Enlaces',
        ],
        'language' => [
            'singular' => 'Idioma',
            'plural' => 'Idiomas',
        ],
        'profile' => 'Perfil',
        'metadata' => 'Metadatos',
    ],

    'sections' => [
        'core_seo' => 'SEO Principal',
        'core_seo_description' => 'Información esencial de identidad y motores de búsqueda.',
        'social_presence' => 'Presencia Social',
        'social_presence_description' => 'Administra cómo aparece tu sitio en LinkedIn, Twitter y WhatsApp.',
        'technical_config' => 'Configuración Técnica',
    ],

    'messages' => [
        'section_active' => 'Sección visible en el sitio (Contiene datos)',
        'section_inactive' => 'Sección oculta (Sin datos)',
        'resume_not_found' => 'Currículum no encontrado.',
    ],

    'fields' => [
        'abstract' => 'Resumen',
        'academic_metadata' => 'Identificadores Académicos (GEO)',
        'activity_type' => 'Tipo de Actividad',
        'agency' => 'Agencia / Institución',

        // --- Group: Aliases ---
        'aliases' => 'Alias / Seudónimos',
        'aliases_placeholder' => 'Ej: Matiz, M. Madel',
        // ----------------------

        'attachments' => 'Archivos adjuntos',
        'avatar_gif' => 'Avatar animado (GIF)',
        'avatar_jpeg' => 'Foto de perfil (JPEG/PNG)',
        'avatar_og' => 'Imagen para redes sociales (OG Image)',
        'avatar_og_helper' => 'Tamaño recomendado: 1200x630px',
        'bio' => 'Biografía',
        'category' => 'Categoría',
        'change_language' => 'Cambiar idioma',
        'city' => 'Ciudad',
        'color' => 'Color',
        'content' => 'Contenido',
        'country' => 'País',
        'created_at' => 'Fecha de creación',
        'currently' => 'Actualmente / Presente',
        'default_message' => 'Mensaje predeterminado (WhatsApp)',
        'degree' => 'Título / Grado',
        'delete' => 'Eliminar',
        'department' => 'Departamento',
        'description' => 'Descripción',
        'doi' => 'DOI',

        // --- Group: Download Resume ---
        'download_resume' => 'Currículum Vitae (PDF)',
        'download_resume_helper' => 'Sube tu CV oficial. Si se deja vacío, el sitio utilizará la función de impresión de la página.',
        // ------------------------------

        'edit' => 'Editar',
        'email' => 'Correo electrónico',
        'end_date' => 'Fecha de finalización',

        // --- Group: Favicon ---
        'favicon' => 'Favicon (Icono del sitio)',
        'favicon_helper' => 'El ícono que aparece en la pestaña del navegador (se recomienda 32x32px).',
        // ----------------------

        'first_name' => 'Nombre',
        'funding_type' => 'Tipo de financiamiento',
        'hide_content' => 'Ocultar contenido',
        'icon' => 'Ícono',
        'identifier' => 'Identificador técnico',
        'id_link_value' => 'ID o Enlace',
        'institution' => 'Institución',
        'is_active' => 'Activo',
        'is_whatsapp' => '¿Es un número de WhatsApp?',
        'keyword_1' => 'Palabra clave 1',
        'keyword_2' => 'Palabra clave 2',
        'keyword_3' => 'Palabra clave 3',
        'keyword_4' => 'Palabra clave 4',
        'keyword_5' => 'Palabra clave 5',
        'keywords' => 'Palabras clave',
        'label' => 'Etiqueta',
        'language_name' => 'Idioma',
        'last_name' => 'Apellido',
        'name' => 'Nombre de la sección',
        'order' => 'Orden',
        'organization' => 'Organización',
        'phone' => 'Teléfono',
        'platform_key' => 'Plataforma (ej: orcid)',
        'print' => 'Imprimir página',
        'profile_images' => 'Imágenes de perfil',
        'profile_picture_avatar' => 'Foto de perfil principal',
        'profile_picture_avatar_in_motion' => 'Foto de perfil animada',
        'property_key' => 'Propiedad (ej: og:type)',
        'property_value' => 'Contenido',
        'publication_date' => 'Fecha de publicación',
        'robots' => 'Indexación de motores de búsqueda',
        'robots_private' => 'Privado (No indexar)',
        'robots_public' => 'Público (Indexar y seguir)',
        'role' => 'Rol / Puesto',
        'show_content' => 'Mostrar contenido',
        'social_metadata' => 'Metaetiquetas sociales',
        'sort' => 'Orden de clasificación',
        'start_date' => 'Fecha de inicio',
        'status' => 'Estado',
        'subtitle' => 'Subtítulo (Pantalla pública)',

        // --- Group: Subtitle Variations ---
        'subtitle_variations' => 'Variaciones de género del título (Para IA y SEO)',
        'subtitle_variations_helper' => 'Estos términos NO aparecerán en la pantalla. Se inyectarán en los metadatos para asegurar que tu perfil sea encontrado independientemente de la inflexión de género buscada.',
        'subtitle_variations_placeholder' => 'Ej: Investigadora, Investigador',
        // ----------------------------------

        'theme_color' => 'Color del tema',
        'title' => 'Título',

        // --- Group: Title Suffix ---
        'title_suffix' => 'Sufijo del título',
        'title_suffix_placeholder' => 'Ej: Portafolio Académico',
        // ---------------------------

        'type' => 'Tipo',
        'updated_at' => 'Fecha de actualización',
        'url' => 'URL',
        'view' => 'Ver',
        'without_name' => 'Sin nombre',
        'without_role' => 'Sin cargo',
    ],
];
