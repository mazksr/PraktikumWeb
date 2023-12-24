<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canViewAny(): bool
    {
        return in_array(auth()->user()->role, ['admin', 'user']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('nomor_telp')->required(),
                Forms\Components\TextInput::make('umur'),
                Select::make('gender')
                        ->options([
                            'male' => 'Laki-laki',
                            'female' => 'Perempuan',
                        ])
                        ->native(false)
                        ->required(),
                Forms\Components\TextInput::make('desc_self')->label("Deskripsi diri") ->required(),
                Forms\Components\TextInput::make('skill') ->required(),
                Forms\Components\TextInput::make('userId')->hidden(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = auth()->user(); 
        $user_id = $user->id;

        return $table
        ->when($user->role !== 'admin', function (Table $table) use ($user_id) {
            return $table->modifyQueryUsing(function (Builder $query) use ($user_id) {
                $query->where('userId', $user_id);
            });
        })
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('nomor_telp'),
                Tables\Columns\TextColumn::make('umur'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('desc_self')->label("Deskripsi diri"),
                Tables\Columns\TextColumn::make('skill'),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }    
}
