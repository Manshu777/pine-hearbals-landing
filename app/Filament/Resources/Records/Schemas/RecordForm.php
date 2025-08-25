<?php

namespace App\Filament\Resources\Records\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('date_of_record'),
                TextInput::make('item_name'),
                TextInput::make('mfg_lic_no'),
                TextInput::make('packing_trader'),
                TextInput::make('product_name'),
                TextInput::make('batch_size'),
                TextInput::make('pack_size'),
                TextInput::make('bottle_jar'),
                TextInput::make('color_material'),
                TextInput::make('form_of_product'),
                TextInput::make('ph_value'),
                TextInput::make('fragrance_flavour'),
                TextInput::make('no_of_packs'),
                TextInput::make('batch_number'),
                DatePicker::make('manufacturing_date'),
                TextInput::make('shelf_life'),
                TextInput::make('no_of_sample'),
                TextInput::make('sampled_by'),
                TextInput::make('sample_handed_over_to'),
                TextInput::make('qc_checked'),
                TextInput::make('record_manager'),
            ]);
    }
}
