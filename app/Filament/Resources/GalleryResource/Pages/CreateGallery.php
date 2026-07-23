<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Services\SiteContext;
use Filament\Resources\Pages\CreateRecord;
use staabm\SideEffectsDetector\SideEffect;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Przypisanie site_id zalogowanego użytkownika
        $data['site_id'] = SiteContext::getCurrentSiteId();
        dd($data);

        return $data;
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
