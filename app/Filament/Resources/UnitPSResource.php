<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\UnitPS;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\UnitPSResource\Pages;

class UnitPSResource extends Resource
{
    protected static ?string $model = UnitPS::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Tambah Unit PS';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_seri')
                    ->required()
                    ->maxLength(20),

                Forms\Components\TextInput::make('tipe_ps')
                    ->required()
                    ->maxLength(20),

                Forms\Components\TextInput::make('kondisi')
                    ->required()
                    ->maxLength(20),

                Forms\Components\TextInput::make('status')
                    ->default('Tersedia')
                    ->required()
                    ->maxLength(20),

                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('foto-unit')   // folder khusus foto
                    ->disk('public')           // simpan di storage/app/public
                    ->preserveFilenames()      // nama file asli tetap dipakai
                    ->required()
                    ->label('Foto Unit')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_seri')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tipe_ps')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kondisi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->searchable(),

                ImageColumn::make('foto')
                    ->disk('public')
                    ->height(80)
                    ->label('Foto'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListUnitPS::route('/'),
            'create' => Pages\CreateUnitPS::route('/create'),
            'edit' => Pages\EditUnitPS::route('/{record}/edit'),
        ];
    }
}
