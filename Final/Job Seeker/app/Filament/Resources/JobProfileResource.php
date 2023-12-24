<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobProfileResource\Pages;
use App\Filament\Resources\JobProfileResource\RelationManagers;
use App\Models\JobProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobProfileResource extends Resource
{
    protected static ?string $model = JobProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
      return false;
    }

    public static function canEdit($model): bool
    {
      return false;
    }

    public static function canViewAny(): bool
    {
        return in_array(auth()->user()->role, ['admin', 'employer']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table

            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('CV'),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListJobProfiles::route('/'),
            'create' => Pages\CreateJobProfile::route('/create'),
            'edit' => Pages\EditJobProfile::route('/{record}/edit'),
        ];
    }    
}
