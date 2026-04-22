<?php

namespace App\Filament\Resources\Metadata\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MetadataForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // SECTION: Core Content
            Section::make(__('admin.sections.core_seo'))
                ->description(__('admin.sections.core_seo_description'))
                ->schema([
                    FileUpload::make('favicon')
                        ->label(__('admin.fields.favicon'))
                        ->image()
                        ->disk('public')
                        ->maxSize(1048576) // 1GB limit
                        ->directory('seo')
                        ->avatar()
                        ->helperText(__('admin.fields.favicon_helper')),
                    TextInput::make('title_suffix')
                        ->label(__('admin.fields.title_suffix'))
                        ->placeholder(__('admin.fields.title_suffix_placeholder')),
                    Textarea::make('description')
                        ->label(__('admin.fields.description'))
                        ->maxLength(160),
                    TagsInput::make('keywords')
                        ->label(__('admin.fields.keywords')),
                ])
                ->collapsible(),

            // SECTION: Social Media (The migrated OG logic)
            Section::make(__('admin.sections.social_presence'))
                ->description(__('admin.sections.social_presence_description'))
                ->schema([
                    FileUpload::make('og_image')
                        ->label(__('admin.fields.avatar_og'))
                        ->image()
                        ->disk('public')
                        ->maxSize(1048576) // 1GB limit
                        ->directory('seo')
                        ->imageEditor()
                        ->imageAspectRatio('1200:630') // Optimized for social sharing (1200x630)
                        ->helperText(__('admin.fields.avatar_og_helper')),

                    KeyValue::make('social_metadata')
                        ->label(__('admin.fields.social_metadata'))
                        ->keyLabel(__('admin.fields.property_key'))
                        ->valueLabel(__('admin.fields.property_value'))
                        ->default([]),
                ])
                ->collapsible(),

            // SECTION: Technical & Academic
            Section::make(__('admin.sections.technical_config'))
                ->schema([
                    TextInput::make('theme_color')
                        ->label(__('admin.fields.theme_color'))
                        ->type('color')
                        ->default('#ffffff'),
                    Select::make('robots')
                        ->label(__('admin.fields.robots'))
                        ->options([
                            'index, follow' => __('admin.fields.robots_public'),
                            'noindex, nofollow' => __('admin.fields.robots_private'),
                        ])
                        ->default('index, follow'),

                    KeyValue::make('academic_metadata')
                        ->label(__('admin.fields.academic_metadata'))
                        ->keyLabel(__('admin.fields.platform_key'))
                        ->valueLabel(__('admin.fields.id_link_value'))
                        ->default([]),
                ])
                ->columnSpanFull()
                ->collapsible(),
        ]);
    }
}
