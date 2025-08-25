<?php
namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\ProductCategory;

use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('category_id')
                    ->label('Category')
                    ->required()
                    ->options(ProductCategory::all()->pluck('name', 'id'))
                    ->searchable(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
              
           

                FileUpload::make('image')
                    ->disk('public')
                    ->directory('product-img')

                    ->image(),
            ]);
    }
}
