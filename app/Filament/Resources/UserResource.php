<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user'; // https://heroicons.com/ Para cambiar el icono

    protected static ?string $navigationLabel = 'Usuarios'; // Cambiar el nombre de la sección

    protected static ?string $navigationGroup = 'Ver y Registrar Usuarios'; // Cambiar el nombre del grupo
    
    protected static ?string $modelLabel = 'Usuarios'; // Cambiar el nombre del modelo

    protected static $roles = [
        0 => 'Seleccionar rol',
        1 => 'Administrador',
        2 => 'Jefe de departamento de carrera',
        3 => 'Docente',
        99 => 'Estudiante',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('rol')
                    ->label('Rol')
                    ->options(
                        static::$roles
                    )
                    ->selectablePlaceholder(false)
                    ->default(0)
                    ->disableOptionWhen(fn (string $value): bool => $value === '0')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('rol')
                ->formatStateUsing(fn (string $state): string => static::$roles[$state])
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
