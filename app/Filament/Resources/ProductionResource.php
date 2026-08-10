<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductionResource\Pages;
use App\Filament\Resources\ProductionResource\RelationManagers;
use App\Models\Production;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductionResource extends Resource
{
    protected static ?string $model = Production::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Information')
                    ->schema([
                        Forms\Components\DatePicker::make('production_date')
                            ->required(),
                        Forms\Components\Select::make('site_id')
                            ->label('Site')
                            ->relationship('site', 'name')
                            ->required(),
                        Forms\Components\Select::make('shift_id')
                            ->label('Shift')
                            ->relationship('shift', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('no_tiket')
                            ->required()
                            ->maxLength(50),
                        
                        Forms\Components\TimePicker::make('start_time'),
                        Forms\Components\TimePicker::make('end_time'),
                    
                        Forms\Components\Textarea::make('note'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Detail Information')
                    ->schema([
                        Forms\Components\Select::make('unit_id')
                            ->label('Unit')
                            ->relationship('unit', 'unit_code')
                            ->required(),
                        Forms\Components\Select::make('employee_id')
                            ->label('Employee')
                            ->relationship('employee', 'name')
                            ->required(),

                        Forms\Components\TextInput::make('bruto')
                            ->numeric(),
                        Forms\Components\TextInput::make('tara')
                            ->numeric(),
                        Forms\Components\TextInput::make('tonase')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('production_date')->date(),
                Tables\Columns\TextColumn::make('site.name')->label('Site'),
                Tables\Columns\TextColumn::make('shift.name')->label('Shift'),
                Tables\Columns\TextColumn::make('no_tiket'),
                Tables\Columns\TextColumn::make('unit.unit_code')->label('Unit'),
                Tables\Columns\TextColumn::make('employee.name')->label('Employee'),
                Tables\Columns\TextColumn::make('tonase'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListProductions::route('/'),
            'create' => Pages\CreateProduction::route('/create'),
            'edit' => Pages\EditProduction::route('/{record}/edit'),
        ];
    }
}
