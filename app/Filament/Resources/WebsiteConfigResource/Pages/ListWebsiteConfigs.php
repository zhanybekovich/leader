<?php

namespace App\Filament\Resources\WebsiteConfigResource\Pages;

use App\Filament\Resources\WebsiteConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListWebsiteConfigs extends ListRecords
{
    protected static string $resource = WebsiteConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    protected function query(): Builder
    {
        return parent::query()->with(['company_logo_id']);
    }
}
