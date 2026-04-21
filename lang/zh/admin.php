<?php

return [
    'resources' => [
        'work' => [
            'singular' => '出版物',
            'plural' => '出版物',
        ],
        'education' => [
            'singular' => '教育背景',
            'plural' => '教育与学位',
        ],
        'employment' => [
            'singular' => '工作经历',
            'plural' => '工作经历',
        ],
        'professional_activity' => [
            'singular' => '专业活动',
            'plural' => '专业活动',
        ],
        'funding' => [
            'singular' => '资金',
            'plural' => '资金与项目',
        ],
        'external_link' => [
            'singular' => '链接',
            'plural' => '链接',
        ],
        'language' => [
            'singular' => '语言',
            'plural' => '语言',
        ],
        'profile' => '个人资料',
        'metadata' => '元数据',
    ],

    'sections' => [
        'core_seo' => '核心 SEO',
        'core_seo_description' => '基本身份和搜索引擎信息。',
        'social_presence' => '社交媒体展示',
        'social_presence_description' => '管理您的网站在 LinkedIn、Twitter 和 WhatsApp 上的显示方式。',
        'technical_config' => '技术配置',
    ],

    'messages' => [
        'section_active' => '网站上可见的版块（包含数据）',
        'section_inactive' => '隐藏的版块（无数据）',
        'resume_not_found' => '未找到简历。',
    ],

    'fields' => [
        'abstract' => '摘要',
        'academic_metadata' => '学术标识符 (GEO)',
        'activity_type' => '活动类型',
        'agency' => '机构 / 赞助单位',

        // --- Group: Aliases ---
        'aliases' => '别名 / 笔名',
        'aliases_placeholder' => '例如：Matiz, M. Madel',
        // ----------------------

        'attachments' => '附件',
        'avatar_gif' => '动态头像 (GIF)',
        'avatar_jpeg' => '个人资料照片 (JPEG/PNG)',
        'avatar_og' => '社交分享图片 (OG Image)',
        'avatar_og_helper' => '推荐尺寸：1200x630px',
        'bio' => '个人简介',
        'category' => '类别',
        'change_language' => '更改语言',
        'city' => '城市',
        'color' => '颜色',
        'content' => '内容',
        'country' => '国家',
        'created_at' => '创建时间',
        'currently' => '目前 / 至今',
        'default_message' => '默认消息 (WhatsApp)',
        'degree' => '学位',
        'delete' => '删除',
        'department' => '部门 / 院系',
        'description' => '描述',
        'doi' => 'DOI',

        // --- Group: Download Resume ---
        'download_resume' => '个人简历 (PDF)',
        'download_resume_helper' => '上传您的正式简历。如果留空，网站将使用页面的打印功能。',
        // ------------------------------

        'edit' => '编辑',
        'email' => '电子邮件',
        'end_date' => '结束日期',

        // --- Group: Favicon ---
        'favicon' => '网站图标 (Favicon)',
        'favicon_helper' => '显示在浏览器标签页中的图标（推荐 32x32px）。',
        // ----------------------

        'first_name' => '名字',
        'funding_type' => '资金类型',
        'hide_content' => '隐藏内容',
        'icon' => '图标',
        'identifier' => '技术标识符',
        'id_link_value' => 'ID 或链接',
        'institution' => '机构 / 学校',
        'is_active' => '激活',
        'is_whatsapp' => '这是一个 WhatsApp 号码吗？',
        'keyword_1' => '关键词 1',
        'keyword_2' => '关键词 2',
        'keyword_3' => '关键词 3',
        'keyword_4' => '关键词 4',
        'keyword_5' => '关键词 5',
        'keywords' => '关键词',
        'label' => '标签 / 名称',
        'language_name' => '语言',
        'last_name' => '姓氏',
        'name' => '版块名称',
        'order' => '排序',
        'organization' => '组织',
        'phone' => '电话',
        'platform_key' => '平台（例如：orcid）',
        'print' => '打印页面',
        'profile_images' => '个人资料图片',
        'profile_picture_avatar' => '主要个人资料图片',
        'profile_picture_avatar_in_motion' => '动态个人资料图片',
        'property_key' => '属性（例如：og:type）',
        'property_value' => '内容',
        'publication_date' => '出版日期',
        'robots' => '搜索引擎索引',
        'robots_private' => '私有（不索引）',
        'robots_public' => '公开（索引并跟踪）',
        'role' => '角色 / 职位',
        'show_content' => '显示内容',
        'social_metadata' => '社交元标签',
        'sort' => '排序顺序',
        'start_date' => '开始日期',
        'status' => '状态',
        'subtitle' => '副标题（公开显示）',

        // --- Group: Subtitle Variations ---
        'subtitle_variations' => '称呼性别变体（用于 AI 和 SEO）',
        'subtitle_variations_helper' => '这些词语不会出现在屏幕上。它们将被注入到元数据中，以确保无论搜索哪种性别词形，都能找到您的个人资料。',
        'subtitle_variations_placeholder' => '例如：研究员',
        // ----------------------------------

        'theme_color' => '主题颜色',
        'title' => '标题',

        // --- Group: Title Suffix ---
        'title_suffix' => '标题后缀',
        'title_suffix_placeholder' => '例如：学术档案',
        // ---------------------------

        'type' => '类型',
        'updated_at' => '更新时间',
        'url' => '网址 (URL)',
        'view' => '查看',
        'without_name' => '无名称',
        'without_role' => '无职位',
    ],
];
