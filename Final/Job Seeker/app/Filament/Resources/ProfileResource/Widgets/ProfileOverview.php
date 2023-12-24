<?php

namespace App\Filament\Resources\ProfileResource\Widgets;

use Filament\Widgets\Widget;

class ProfileOverview extends Widget
{
    protected static string $view = 'filament.resources.profile-resource.widgets.profile-overview';

    public static function getWidgets(): array
    {
        return [
            CustomerResource\Widgets\CustomerOverview::class,
        ];
    }
}
