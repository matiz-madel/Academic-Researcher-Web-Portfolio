<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Faker\Core\File;
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
                    ->label('Nome')
                    ->required(),
                TextInput::make('last_name')
                    ->label('Sobrenome')
                    ->required(),
                Textarea::make('subtitle')
                    ->label('Subtítulo (Profissão)')
                    ->columnSpanFull(),
                Textarea::make('bio')
                    ->label('Biografia / Descrição')
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('aliases')
                    ->label('Outros nomes (AKAs)')
                    ->placeholder('Digite um nome e pressione Enter')
                    ->separator(',')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('E-mail')
                    ->email(),
                Fieldset::make()
                    ->schema([
                    TextInput::make('phone')
                        ->label('Telefone')
                        ->columnSpanFull()
                        ->tel(),
                    Toggle::make('is_whatsapp')
                        ->label('Este número é WhatsApp?')
                        ->columnSpanFull()
                        ->live(),
                    Textarea::make('default_message')
                        ->label('Mensagem Padrão para WhatsApp')
                        ->columnSpanFull()
                        ->visible(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('is_whatsapp')),
                    ]),
                Fieldset::make('Imagens de Perfil')
                    ->schema([
                FileUpload::make('avatar_jpeg')
                    ->label('Foto de Perfil Principal (JPEG/PNG)')
                    ->image()
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->directory('avatars'),
                FileUpload::make('avatar_gif')->label('Foto Animada ao passar o mouse (GIF)')
                    ->image()
                    ->disk('public')
                    ->acceptedFileTypes(['image/gif'])
                    ->directory('avatars'),
                ])->columnSpanFull(),
            ]);
    }
}
