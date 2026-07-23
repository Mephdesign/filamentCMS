<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\PostResource;
use App\Filament\Resources\SectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSection extends EditRecord
{
    protected static string $resource = SectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    // Opcjonalnie: usuwanie zdjęcia z dysku przed skasowaniem rekordu z bazy
                    if ($record->featured_image) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($record->featured_image);
                    }
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
