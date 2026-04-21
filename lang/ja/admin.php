<?php

return [
    'resources' => [
        'work' => [
            'singular' => '出版物',
            'plural' => '出版物',
        ],
        'education' => [
            'singular' => '学歴',
            'plural' => '学歴・学位',
        ],
        'employment' => [
            'singular' => '職歴',
            'plural' => '職歴',
        ],
        'professional_activity' => [
            'singular' => '専門的活動',
            'plural' => '専門的活動',
        ],
        'funding' => [
            'singular' => '資金・助成金',
            'plural' => '資金・助成金',
        ],
        'external_link' => [
            'singular' => 'リンク',
            'plural' => 'リンク',
        ],
        'language' => [
            'singular' => '言語',
            'plural' => '言語',
        ],
        'profile' => 'プロフィール',
        'metadata' => 'メタデータ',
    ],

    'sections' => [
        'core_seo' => '基本SEO',
        'core_seo_description' => 'アイデンティティと検索エンジンに関する基本情報。',
        'social_presence' => 'ソーシャルプレゼンス',
        'social_presence_description' => 'LinkedIn、Twitter、WhatsAppでのサイトの表示を管理します。',
        'technical_config' => '技術設定',
    ],

    'messages' => [
        'section_active' => 'サイトで表示中のセクション（データあり）',
        'section_inactive' => '非表示のセクション（データなし）',
        'resume_not_found' => '履歴書が見つかりません。',
    ],

    'fields' => [
        'abstract' => '概要 / アブストラクト',
        'academic_metadata' => '学術識別子 (GEO)',
        'activity_type' => '活動タイプ',
        'agency' => '機関 / 代理店',

        // --- Group: Aliases ---
        'aliases' => '別名 / ペンネーム',
        'aliases_placeholder' => '例: Matiz, M. Madel',
        // ----------------------

        'attachments' => '添付ファイル',
        'avatar_gif' => 'アニメーションアバター (GIF)',
        'avatar_jpeg' => 'プロフィール画像 (JPEG/PNG)',
        'avatar_og' => 'ソーシャルシェア画像 (OG Image)',
        'avatar_og_helper' => '推奨サイズ: 1200x630px',
        'bio' => '略歴',
        'category' => 'カテゴリ',
        'change_language' => '言語を変更',
        'city' => '市 / 都市',
        'color' => '色',
        'content' => 'コンテンツ',
        'country' => '国',
        'created_at' => '作成日',
        'currently' => '現在',
        'default_message' => 'デフォルトメッセージ (WhatsApp)',
        'degree' => '学位 / 称号',
        'delete' => '削除',
        'department' => '部署 / 学科',
        'description' => '説明',
        'doi' => 'DOI',

        // --- Group: Download Resume ---
        'download_resume' => '履歴書 (PDF)',
        'download_resume_helper' => '公式の履歴書をアップロードします。空の場合、サイトはページの印刷機能を使用します。',
        // ------------------------------

        'edit' => '編集',
        'email' => 'メールアドレス',
        'end_date' => '終了日',

        // --- Group: Favicon ---
        'favicon' => 'ファビコン (サイトアイコン)',
        'favicon_helper' => 'ブラウザのタブに表示されるアイコン（32x32px推奨）。',
        // ----------------------

        'first_name' => '名',
        'funding_type' => '資金提供のタイプ',
        'hide_content' => 'コンテンツを隠す',
        'icon' => 'アイコン',
        'identifier' => '技術識別子',
        'id_link_value' => 'IDまたはリンク',
        'institution' => '機関',
        'is_active' => 'アクティブ',
        'is_whatsapp' => 'WhatsAppの番号ですか？',
        'keyword_1' => 'キーワード 1',
        'keyword_2' => 'キーワード 2',
        'keyword_3' => 'キーワード 3',
        'keyword_4' => 'キーワード 4',
        'keyword_5' => 'キーワード 5',
        'keywords' => 'キーワード',
        'label' => 'ラベル',
        'language_name' => '言語',
        'last_name' => '姓',
        'name' => 'セクション名',

        'order' => '順序',
        'organization' => '組織',
        'phone' => '電話番号',
        'platform_key' => 'プラットフォーム (例: orcid)',
        'print' => 'ページを印刷',
        'profile_images' => 'プロフィール画像',
        'profile_picture_avatar' => 'メインプロフィール画像',
        'profile_picture_avatar_in_motion' => 'アニメーションプロフィール画像',
        'property_key' => 'プロパティ (例: og:type)',
        'property_value' => 'コンテンツ',
        'publication_date' => '出版日',
        'robots' => '検索エンジンのインデックス作成',
        'robots_private' => 'プライベート (インデックスしない)',
        'robots_public' => 'パブリック (インデックスしてリンクをたどる)',
        'role' => '役職 / 役割',
        'show_content' => 'コンテンツを表示',
        'social_metadata' => 'ソーシャルメタタグ',
        'sort' => '並べ替え順',
        'start_date' => '開始日',
        'status' => 'ステータス',
        'subtitle' => 'サブタイトル (一般公開)',

        // --- Group: Subtitle Variations ---
        'subtitle_variations' => 'タイトルのバリエーション (AIおよびSEO用)',
        'subtitle_variations_helper' => 'これらの用語は画面には表示されません。検索される言葉のバリエーションに関係なくプロフィールが確実に見つかるように、メタデータに挿入されます。',
        'subtitle_variations_placeholder' => '例: 研究者',
        // ----------------------------------

        'theme_color' => 'テーマカラー',
        'title' => 'タイトル',

        // --- Group: Title Suffix ---
        'title_suffix' => 'タイトルの接尾辞',
        'title_suffix_placeholder' => '例: アカデミックポートフォリオ',
        // ---------------------------

        'type' => 'タイプ',
        'updated_at' => '更新日',
        'url' => 'URL',
        'view' => '表示',
        'without_name' => '名前なし',
        'without_role' => '役職なし',
    ],
];
