<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AksesorisResource\Pages;
use App\Models\Aksesoris;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;

class AksesorisResource extends Resource
{
    protected static ?string $model = Aksesoris::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Tambah Aksesoris';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jenis')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('kondisi')
                    ->required()
                    ->maxLength(20),

                Forms\Components\TextInput::make('status')
                    ->default('Tersedia')
                    ->required()
                    ->maxLength(20),

                // Tambah upload foto aksesoris
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('foto-aksesoris')
                    ->disk('public')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->label('Foto Aksesoris')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kondisi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->searchable(),

                // Tampilkan foto di tabel
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
            'index' => Pages\ListAksesoris::route('/'),
            'create' => Pages\CreateAksesoris::route('/create'),
            'edit' => Pages\EditAksesoris::route('/{record}/edit'),
        ];
    }
}
