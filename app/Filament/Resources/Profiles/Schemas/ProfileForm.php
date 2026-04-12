<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Faker\Core\File;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label(__('admin.fields.first_name'))
                    ->required(),
                TextInput::make('last_name')
                    ->label(__('admin.fields.last_name'))
                    ->required(),
                Textarea::make('subtitle')
                    ->label(__('admin.fields.subtitle'))
                    ->required()
                    ->columnSpanFull(),
                TagsInput::make('subtitle_variations')
                    ->label(__('admin.fields.subtitle_variations'))
                    ->placeholder(__('admin.fields.subtitle_variations_placeholder'))
                    ->helperText(__('admin.fields.subtitle_variations_helper'))
                    ->separator(',')
                    ->columnSpanFull(),
                Textarea::make('bio')
                    ->label(__('admin.fields.bio'))
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('aliases')
                    ->label(__('admin.fields.aliases'))
                    ->placeholder(__('admin.fields.aliases_placeholder'))
                    ->separator(',')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label(__('admin.fields.email'))
                    ->email(),
                Fieldset::make()
                    ->schema([
                    TextInput::make('phone')
                        ->label(__('admin.fields.phone'))
                        ->columnSpanFull()
                        ->tel(),
                    Toggle::make('is_whatsapp')
                        ->label(__('admin.fields.is_whatsapp'))
                        ->columnSpanFull()
                        ->live(),
                    Textarea::make('default_message')
                        ->label(__('admin.fields.default_message'))
                        ->columnSpanFull()
                        ->visible(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('is_whatsapp')),
                    ]),
                Fieldset::make(__('admin.fields.profile_images'))
                    ->schema([
                FileUpload::make('avatar_jpeg')
                    ->label(__('admin.fields.avatar_jpeg'))
                    ->image()
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->directory('avatars'),
                FileUpload::make('avatar_gif')
                    ->label(__('admin.fields.avatar_gif'))
                    ->image()
                    ->disk('public')
                    ->acceptedFileTypes(['image/gif'])
                    ->directory('avatars'),
                ])->columnSpanFull(),
                FileUpload::make('avatar_og')
                    ->label(__('admin.fields.avatar_og'))
                    ->image()
                    ->automaticallyResizeImagesMode('cover')
                    ->imageAspectRatio('1.91:1') // Proporção aproximada de 1200x630
                    ->automaticallyResizeImagesToWidth('1200')
                    ->automaticallyResizeImagesToHeight('630'),
                FileUpload::make('resume_pdf')
                    ->label(__('admin.fields.download_resume'))
                    ->acceptedFileTypes(['application/pdf'])
                    ->disk('public')
                    ->directory('resumes')
                    ->maxSize(102400) // Limite de 1GB
                    ->downloadable()
                    ->helperText(__('admin.fields.download_resume_helper')),
            ]);
    }
}
