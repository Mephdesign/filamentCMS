<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingsResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class SiteSettingsResource extends Resource
{
    protected static ?string $model = SiteSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Ustawienia strony';
    protected static ?string $navigationGroup = 'CMS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('SettingsTabs')
                    ->tabs([
                        Tabs\Tab::make('Sekcja Główna (Hero)')
                            ->schema([
                                TextInput::make('hero.hero_title')
                                    ->label('Główny nagłówek (H1)')
                                    ->helperText('Możesz użyć HTML, np. projekt <span>i...</span>')
                                    ->required(),
                                Textarea::make('hero.hero_subtitle')
                                    ->label('Podtytuł w sekcji Hero')
                                    ->rows(3)
                                    ->required(),
                                Forms\Components\FileUpload::make('hero.featured_image')
                                    ->image()
                                    ->directory('hero'),
                            ]),
                        Tabs\Tab::make('O nas / Pracownia')
                            ->schema([
                                TextInput::make('about.about_heading')
                                    ->label('Mniejszy nagłówek')
                                    ->default('Wnętrza Wyjątkowe!'),
                                RichEditor::make('about.about_content')
                                    ->label('Główna treść o pracowni')
                                    ->required(),
                                Forms\Components\FileUpload::make('about.about_image')
                                    ->image()
                                    ->directory('about'),
                            ]),
                        Tabs\Tab::make('Filozofia / Rzemieślnicy')
                            ->schema([
                                TextInput::make('filo.philosophy_tag')
                                    ->label('Hashtag / Tag górny')
                                    ->default('#SZANUJMYPRACĘRĄK'),
                                TextInput::make('filo.philosophy_title')
                                    ->label('Tytuł sekcji'),
                                Textarea::make('filo.philosophy_content')
                                    ->label('Treść sekcji opisowej'),
                            ]),
                        Tabs\Tab::make('Dane Kontaktowe')
                            ->schema([
                                TextInput::make('contact.contact_address')->label('Adres pracowni'),
                                TextInput::make('contact.contact_hours')->label('Godziny pracy'),
                                TextInput::make('contact.contact_phone')->label('Numer telefonu'),
                                TextInput::make('contact.contact_email')->label('Adres E-mail')->email(),
                            ]),
                    ])
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSettings::route('/'),
        ];
    }
}
