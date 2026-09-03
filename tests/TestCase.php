<?php

namespace C6Digital\FilamentPlausiblePage\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use C6Digital\FilamentPlausiblePage\FilamentPlausiblePageServiceProvider;
use C6Digital\FilamentPlausiblePage\Tests\Fixtures\TestPanelProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Infolists\InfolistsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\Schemas\SchemasServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Filament\Widgets\WidgetsServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use RyanChandler\BladeCaptureDirective\BladeCaptureDirectiveServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return array_values(array_filter([
            BladeCaptureDirectiveServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            // Filament's SupportServiceProvider rebinds Livewire's DataStore to its own
            // subclass. Livewire's provider must register after it, otherwise Livewire
            // binds the plain DataStore as a shared instance and Filament's later
            // non-shared bind() replaces it, handing out a fresh store per resolve.
            SupportServiceProvider::class,
            LivewireServiceProvider::class,
            ActionsServiceProvider::class,
            // filament/schemas only exists on Filament v4 and up.
            class_exists(SchemasServiceProvider::class) ? SchemasServiceProvider::class : null,
            FormsServiceProvider::class,
            InfolistsServiceProvider::class,
            NotificationsServiceProvider::class,
            TablesServiceProvider::class,
            WidgetsServiceProvider::class,
            FilamentServiceProvider::class,
            FilamentPlausiblePageServiceProvider::class,
            TestPanelProvider::class,
        ]));
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('app.key', 'base64:' . base64_encode(random_bytes(32)));
        config()->set('filament-plausible-page.url', 'https://plausible.io/share/example.com?auth=token');
    }
}
