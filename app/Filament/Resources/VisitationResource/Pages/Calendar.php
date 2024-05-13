<?php

namespace App\Filament\Resources\VisitationResource\Pages;

use App\Filament\Resources\VisitationResource;
use Filament\Resources\Pages\Page;

class Calendar extends Page
{
    protected static string $resource = VisitationResource::class;

    protected static string $view = 'filament.resources.visitation-resource.pages.calendar';

    public function mount(): void
    {
        static::authorizeResourceAccess();
    }
}
