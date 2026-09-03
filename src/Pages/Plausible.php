<?php

namespace C6Digital\FilamentPlausiblePage\Pages;

use C6Digital\FilamentPlausiblePage\FilamentPlausiblePagePlugin;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Plausible extends Page
{
    public function getView(): string
    {
        return 'filament-plausible-page::pages.plausible';
    }

    public static function getNavigationIcon(): string | Htmlable | null
    {
        return 'heroicon-o-chart-bar-square';
    }

    public function getHeading(): string | Htmlable
    {
        $plugin = FilamentPlausiblePagePlugin::get();

        if (! $plugin->showPageTitle) {
            return '';
        }

        return parent::getHeading();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return FilamentPlausiblePagePlugin::get()->shouldRegisterNavigation();
    }

    public function getTitle(): string | Htmlable
    {
        return FilamentPlausiblePagePlugin::get()->title;
    }

    public static function getNavigationLabel(): string
    {
        return FilamentPlausiblePagePlugin::get()->title;
    }

    public static function getNavigationGroup(): ?string
    {
        return FilamentPlausiblePagePlugin::get()->navigationGroup;
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'plugin' => FilamentPlausiblePagePlugin::get(),
        ];
    }
}
