<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->label(__('First Name'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->label(__('Last Name'))
                    ->maxLength(255),
                Forms\Components\Select::make('role')
                    ->label(__('Role'))
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->confirmed()
                    ->hidden(null !== $form->getRecord())
                    ->minLength(8)
                    ->maxLength(255),
                Forms\Components\TextInput::make('password_confirmation')
                    ->label(__('Password Confirmation'))
                    ->password()
                    ->hidden(null !== $form->getRecord())
                    ->minLength(8)
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->label(__('Date of Birth'))
                    ->native(false)
                    ->displayFormat('Y-m-d'),
                Forms\Components\TextInput::make('phone_number')
                    ->label(__('Phone Number'))
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label(__('Address'))
                    ->maxLength(255),
                Forms\Components\RichEditor::make('info')
                    ->label(__('Info'))
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label(__('Full Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label(__('Role'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->label(__('Date of Birth'))
                    ->date('Y-m-d')
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label(__('Phone Number'))
                    ->searchable(),
            ])
            ->filters([
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getPluralLabel(): string
    {
        return __('Users');
    }

    public static function getModelLabel(): string
    {
        return __('user');
    }
}
