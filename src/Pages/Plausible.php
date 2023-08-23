<?php

namespace C6Digital\FilamentPlausiblePage\Pages;

use C6Digital\FilamentPlausiblePage\FilamentPlausiblePagePlugin;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Plausible extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static string $view = 'filament-plausible-page::pages.plausible';

    public function getHeading(): string|Htmlable
    {
        $plugin = FilamentPlausiblePagePlugin::get();

        if (!$plugin->showPageTitle) {
            return '';
        }

        return parent::getHeading();
    }

    protected function getViewData(): array
    {
        return [
            'plugin' => FilamentPlausiblePagePlugin::get(),
        ];
    }
}