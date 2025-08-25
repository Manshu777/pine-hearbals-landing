<?php

namespace App\Filament\Resources\Records\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Models\Record;
// use Filament\Tables\Actions\Action;
use Filament\Actions\Action;
class RecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date_of_record')
                    ->date()
                    ->sortable(),
                TextColumn::make('item_name')
                    ->searchable(),
                TextColumn::make('mfg_lic_no')
                    ->searchable(),
                TextColumn::make('packing_trader')
                    ->searchable(),
                TextColumn::make('product_name')
                    ->searchable(),
                TextColumn::make('batch_size')
                    ->searchable(),
            
               

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
             ->recordActions([
                EditAction::make(),
                Action::make('preview_pdf')
        ->label('Preview PDF')
        ->icon('heroicon-o-eye')
        ->openUrlInNewTab() // 🚀 makes it open in a new tab
        ->url(fn (Record $record) => route('records.preview', $record)),
                Action::make('download_pdf')
        ->label('Download PDF')
        ->icon('heroicon-o-arrow-down-tray')
        ->action(function (Record $record) {   // ✅ Correct type
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.record', [
                'record' => $record,
            ]);
            return response()->streamDownload(
                fn () => print($pdf->output()),
                "record_{$record->id}.pdf"
            );
            
        }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->filters([
                //
            ]);


    }
}
