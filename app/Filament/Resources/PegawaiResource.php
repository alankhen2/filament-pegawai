<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PegawaiResource\Pages;
use App\Filament\Resources\PegawaiResource\RelationManagers;
use App\Filament\Resources\PegawaiResource\Widgets\PegawaiStatsOverview;
use App\Models\Kota;
use App\Models\Negara;
use App\Models\Pegawai;
use App\Models\Provinsi;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('negara_id')
                            ->label('Negara')
                            ->options(Negara::all()->pluck('nama', 'id')->toArray())
                            ->reactive()
                            ->required()
                            ->afterStateUpdated(fn(callable $set) => $set('provinsi_id', null)),
                        Select::make('provinsi_id')
                            ->label('Provinsi')
                            ->required()
                            ->options(function (callable $get){
                                $negara = Negara::find($get('negara_id'));
                                if (!$negara){
                                    return Provinsi::all()->pluck('nama', 'id');
                                }
                                return $negara->provinsi->pluck('nama', 'id');
                            })
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('kota_id', null)),
                        Select::make('kota_id')
                            ->label('Kota')
                            ->options(function (callable $get){
                                $provinsi = Provinsi::find($get('provinsi_id'));
                                if (!$provinsi){
                                    return Kota::all()->pluck('nama', 'id');
                                }
                                return $provinsi->kota->pluck('nama', 'id');
                            })
                            ->required()
                            ->reactive(),
                        Select::make('departemen_id')
                            ->relationship('departemen', 'nama')->required(),
                        TextInput::make('nama_depan')->required()->maxLength(255),
                        TextInput::make('nama_belakang')->required()->maxLength(255),
                        TextInput::make('alamat')->required()->maxLength(255),
                        TextInput::make('kode_pos')->required()->maxLength(5),
                        DatePicker::make('tanggal_lahir')->required(),
                        DatePicker::make('tanggal_masuk')->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('nama_depan')->sortable()->searchable(),
                TextColumn::make('nama_belakang')->sortable()->searchable(),
                TextColumn::make('departemen.nama')->sortable(),
                TextColumn::make('tanggal_masuk')->date(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('departemen')->relationship('departemen', 'nama')
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
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            PegawaiStatsOverview::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}
