<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitResource\Pages;
use App\Filament\Resources\UnitResource\RelationManagers;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->label('Company')
                    ->relationship('company', 'name')
                    ->required(),
                Forms\Components\Select::make('site_id')
                    ->label('Site')
                    ->relationship('site', 'name')
                    ->required(),
                Forms\Components\Select::make('model_id')
                    ->label('Model')
                    ->relationship('model', 'name')
                    ->required(),
                Forms\Components\TextInput::make('unit_code')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('model_number')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('chassis_number')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('raw')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('faw')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('gcw')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('engine_model')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('engine_number')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('capacity')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('made_year')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('hm_current')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('km_current')
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')->label('Company'),
                Tables\Columns\TextColumn::make('site.name')->label('Site'),
                Tables\Columns\TextColumn::make('model.name')->label('Model'),
                Tables\Columns\TextColumn::make('unit_code'),
                Tables\Columns\TextColumn::make('model_number'),
                Tables\Columns\TextColumn::make('chassis_number'),
                Tables\Columns\TextColumn::make('engine_model'),
                Tables\Columns\TextColumn::make('engine_number'),
                Tables\Columns\TextColumn::make('capacity'),
                Tables\Columns\TextColumn::make('made_year'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
   Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUnits::route('/'),
        ];
    }
}
