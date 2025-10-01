<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Tambah Game';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('genre')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('platform')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('status')
                    ->default('Tersedia')
                    ->required()
                    ->maxLength(20),

                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('foto-game')
                    ->disk('public')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->label('Cover Game')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),

                Tables\Columns\TextColumn::make('genre')
                    ->searchable(),

                Tables\Columns\TextColumn::make('platform')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->searchable(),

                ImageColumn::make('foto')
                    ->disk('public')
                    ->height(80)
                    ->label('Cover'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
