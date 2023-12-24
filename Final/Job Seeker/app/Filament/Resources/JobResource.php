<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canViewAny(): bool
    {
        return in_array(auth()->user()->role, ['admin', 'employer']);
    }

    public static function form(Form $form): Form
    {
        
        return $form
        
            ->schema([
                Forms\Components\TextInput::make('userId')->hidden(),
                Forms\Components\TextInput::make('posisi')->required(),
                Forms\Components\TextInput::make('lokasi'),
                Select::make('tipe_pekerjaan')
                        ->options([
                            'full-time' => 'Full Time',
                            'part-time' => 'Part Time',
                            'other' => 'Others',
                        ])
                        ->native(false)
                        ->required(),
                Forms\Components\TextInput::make('email')->email() ->required(),
                Forms\Components\TextInput::make('nomor_telp') ->required(),
                Forms\Components\TextInput::make('job_desc')->label("Deskripsi pekerjaan") ->required(),
                Forms\Components\TextInput::make('gaji')->numeric() ->required()

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
                Tables\Columns\TextColumn::make('posisi'),
                Tables\Columns\TextColumn::make('lokasi'),
                Tables\Columns\TextColumn::make('tipe_pekerjaan'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('nomor_telp'),
                Tables\Columns\TextColumn::make('job_desc'),
                Tables\Columns\TextColumn::make('gaji')

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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }    
}
