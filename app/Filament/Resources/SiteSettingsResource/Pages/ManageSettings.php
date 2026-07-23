<?php

namespace App\Filament\Resources\SiteSettingsResource\Pages;

use App\Filament\Resources\SiteSettingsResource;
use App\Models\SiteSetting;
use App\Services\SiteContext;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = SiteSettingsResource::class;
    protected static string $view = 'settings.manage-settings';
    protected static ?string $title = 'Zarządzanie tekstami stałymi';

    public ?array $data = [];

    public function mount(): void
    {
        $siteId = SiteContext::getCurrentSiteId();
        $settings = SiteSetting::where('site_id', $siteId)
            ->get()->groupBy('group');

        $data = [];

        foreach ($settings as $group => $items) {

            foreach ($items as $item) {

                $data[$group][$item->key] = $item->value;
            }
        }

        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return SiteSettingsResource::form($form)
            ->statePath('data');
    }

    public function save(): void
    {
        $state = $this->form->getState();
        $siteId = SiteContext::getCurrentSiteId();
        foreach ($state as $group => $values) {

            foreach ($values as $key => $value) {

                SiteSetting::updateOrCreate(
                    [
                        'site_id' => $siteId,
                        'group' => $group,
                        'key' => $key,
                    ],
                    [
                        'value' => $value,
                    ]
                );
            }
        }

        Notification::make()
            ->title('Zapisano ustawienia')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Zapisz ustawienia')
                ->submit('save'),
        ];
    }
}
