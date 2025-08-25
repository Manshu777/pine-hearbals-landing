<?php

namespace App\Filament\Resources\Slides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               FileUpload::make('image')
    ->image()
    ->required()
    ->disk('public')
    ->directory('slider-img'),

     FileUpload::make('left_image')
    ->image()
    ->disk('public')
    ->directory('slider-img'),

                TextInput::make('alt')
                    ->required(),
                TextInput::make('caption')
                    ->required(),
            ]);
    }
}
