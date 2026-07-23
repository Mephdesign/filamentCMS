<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Services\SiteContext;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('site_id', SiteContext::getCurrentSiteId());
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    // Usuwanie wszystkich wgranych zdjęć z pamięci dyskowej podczas kasowania galerii
                    if (is_array($record->images)) {
                        foreach ($record->images as $image) {
                            \Illuminate\Support\Facades\Storage::disk('public')->delete($image);
                        }
                    }
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
