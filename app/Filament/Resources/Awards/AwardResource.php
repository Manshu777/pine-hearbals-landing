<?php

namespace App\Filament\Resources\Awards;

use App\Filament\Resources\Awards\Pages\CreateAward;
use App\Filament\Resources\Awards\Pages\EditAward;
use App\Filament\Resources\Awards\Pages\ListAwards;
use App\Filament\Resources\Awards\Pages\ViewAward;
use App\Filament\Resources\Awards\Schemas\AwardForm;
use App\Filament\Resources\Awards\Schemas\AwardInfolist;
use App\Filament\Resources\Awards\Tables\AwardsTable;
use App\Models\Award;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AwardResource extends Resource
{
    protected static ?string $model = Award::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Award';

    public static function form(Schema $schema): Schema
    {
        return AwardForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AwardInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AwardsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAwards::route('/'),
            'create' => CreateAward::route('/create'),
            'view' => ViewAward::route('/{record}'),
            'edit' => EditAward::route('/{record}/edit'),
        ];
    }
}
