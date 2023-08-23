<?php

namespace C6Digital\FilamentPlausiblePage;

use C6Digital\FilamentPlausiblePage\Pages\Plausible;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentPlausiblePagePlugin implements Plugin
{
    public bool $showPlausibleFooterMark = true;

    public bool $showPageTitle = true;

    public function getId(): string
    {
        return 'filament-plausible-page';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages([
                Plausible::class
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function hideFooterMark(): static
    {
        $this->showPlausibleFooterMark = false;

        return $this;
    }

    public function hidePageTitle(): static
    {
        $this->showPageTitle = false;

        return $this;
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
