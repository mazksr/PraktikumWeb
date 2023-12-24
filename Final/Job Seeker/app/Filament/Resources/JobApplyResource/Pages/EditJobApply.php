<?php

namespace App\Filament\Resources\JobApplyResource\Pages;

use App\Filament\Resources\JobApplyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobApply extends EditRecord
{
    protected static string $resource = JobApplyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
