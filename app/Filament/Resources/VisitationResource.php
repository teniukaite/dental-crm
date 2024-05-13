<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\VisitationResource\Pages;
use App\Filament\Resources\VisitationResource\RelationManagers;
use App\Models\Visitation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitationResource extends Resource
{
    protected static ?string $model = Visitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('patient_id')
                    ->label(__('Patient'))
                    ->relationship('patient', 'full_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('doctor_id')
                    ->label(__('Doctor'))
                    ->relationship('doctor', 'full_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('service_id')
                    ->label(__('Services'))
                    ->relationship('services', 'name')
                    ->preload()
                    ->searchable()
                    ->multiple()
                    ->required(),
                Forms\Components\DateTimePicker::make('date')
                    ->label(__('Visit Date'))
                    ->native(false)
                    ->displayFormat('Y-m-d H:i')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label(__('Price'))
                    ->numeric()
                    ->postfix('€'),
                Forms\Components\RichEditor::make('description')
                    ->label(__('Description'))
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient.full_name')
                    ->label(__('Patient'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('doctor.full_name')
                    ->label(__('Doctor'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('services.name')
                    ->label(__('Services'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->label(__('Visit Date'))
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label(__('Price'))
                    ->money('EUR')
                    ->sortable(),
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
            'index' => Pages\ListVisitations::route('/'),
            'create' => Pages\CreateVisitation::route('/create'),
            'edit' => Pages\EditVisitation::route('/{record}/edit'),
            'calendar' => Pages\Calendar::route('/calendar'),
        ];
    }

    public static function getPluralLabel(): string
    {
        return __('Visitations');
    }

    public static function getModelLabel(): string
    {
        return __('visitation');
    }
}
