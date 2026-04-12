<?php

namespace App\Filament\Resources\Works\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Enums\WorkType;

class WorkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('admin.fields.title'))
                    ->required(),
                Select::make('type')
                    ->options(WorkType::class)
                    ->label(__('admin.fields.type')),
                Textarea::make('abstract')
                    ->columnSpanFull()
                    ->label(__('admin.fields.abstract')),
                Textarea::make('content')
                    ->columnSpanFull()
                    ->label(__('admin.fields.content')),
                DatePicker::make('publication_date')
                    ->label(__('admin.fields.publication_date')),
                TextInput::make('doi')
                    ->label(__('admin.fields.doi')),
                TextInput::make('url')
                    ->label(__('admin.fields.url'))
                    ->url(),
                TextInput::make('keyword_1')
                    ->label(__('admin.fields.keyword_1')),
                TextInput::make('keyword_2')
                    ->label(__('admin.fields.keyword_2')),
                TextInput::make('keyword_3')
                    ->label(__('admin.fields.keyword_3')),
                TextInput::make('keyword_4')
                    ->label(__('admin.fields.keyword_4')),
                TextInput::make('keyword_5')
                    ->label(__('admin.fields.keyword_5')),
                FileUpload::make('attachments')
                    ->label(__('admin.fields.attachments'))
                    ->multiple()
                    ->directory('works-attachments')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/webp', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(1024000) // 1GB
                    ->downloadable()
                    ->reorderable(),
            ]);
    }
}
