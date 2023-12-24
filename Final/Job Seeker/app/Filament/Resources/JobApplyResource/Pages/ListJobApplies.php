<?php

namespace App\Filament\Resources\JobApplyResource\Pages;

use App\Filament\Resources\JobApplyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobApplies extends ListRecords
{
    protected static string $resource = JobApplyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
