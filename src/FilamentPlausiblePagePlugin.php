<?php

namespace C6Digital\FilamentPlausiblePage;

use C6Digital\FilamentPlausiblePage\Pages\Plausible;
use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentPlausiblePagePlugin implements Plugin
{
    public bool $showPlausibleFooterMark = true;

    public bool $showPageTitle = true;

    public string $title = 'Plausible';

    public ?string $navigationGroup = null;

    public Closure | bool $shouldRegisterNavigation = true;

    public string | Closure | null $plausibleShareUrl = null;

    public function getId(): string
    {
        return 'filament-plausible-page';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages([
                Plausible::class,
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

    public function title(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function navigationGroup(string $navigationGroup): static
    {
        $this->navigationGroup = $navigationGroup;

        return $this;
    }

    public function shouldRegisterNavigationUsing(Closure | bool $value = true): static
    {
        $this->shouldRegisterNavigation = $value;

        return $this;
    }

    public function shouldRegisterNavigation(): bool
    {
        return value($this->shouldRegisterNavigation);
    }

    public function plausibleShareUrl(string | Closure | null $url): static
    {
        $this->plausibleShareUrl = $url;

        return $this;
    }

    public function getPlausibleShareUrl(): string
    {
        return value($this->plausibleShareUrl) ?? config('filament-plausible-page.url');
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
