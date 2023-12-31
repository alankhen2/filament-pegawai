<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NegaraResource\Pages;
use App\Filament\Resources\NegaraResource\RelationManagers;
use App\Filament\Resources\NegaraResource\RelationManagers\PegawaiRelationManager;
use App\Filament\Resources\NegaraResource\RelationManagers\ProvinsiRelationManager;
use App\Models\Negara;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;

class NegaraResource extends Resource
{
    protected static ?string $model = Negara::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'System Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('negara_kode')
                            ->required()
                            ->maxLength(3),
                        TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('negara_kode')->sortable()->searchable(),
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PegawaiRelationManager::class,
            ProvinsiRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNegaras::route('/'),
            'create' => Pages\CreateNegara::route('/create'),
            'edit' => Pages\EditNegara::route('/{record}/edit'),
        ];
    }
}
