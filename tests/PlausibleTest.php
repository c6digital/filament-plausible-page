<?php

use C6Digital\FilamentPlausiblePage\FilamentPlausiblePagePlugin;
use C6Digital\FilamentPlausiblePage\Pages\Plausible;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('registers the plausible page on the panel', function () {
    expect(Filament::getPanel('admin')->getPages())->toContain(Plausible::class);
});

it('renders the page with the configured share url embedded', function () {
    // `@js()` escapes forward slashes, so the url is not in the markup verbatim.
    Livewire::test(Plausible::class)
        ->assertSuccessful()
        ->assertSee('plausible-embed', escape: false)
        ->assertSee('example.com', escape: false)
        ->assertSee('embed.host.js', escape: false);
});

it('shows the footer mark by default and hides it on request', function () {
    Livewire::test(Plausible::class)
        ->assertSee('Plausible Analytics');

    FilamentPlausiblePagePlugin::get()->hideFooterMark();

    Livewire::test(Plausible::class)
        ->assertDontSee('Plausible Analytics');
});

it('uses the plugin title for the heading, title and navigation label', function () {
    FilamentPlausiblePagePlugin::get()->title('Site Analytics');

    expect(Plausible::getNavigationLabel())->toBe('Site Analytics');

    Livewire::test(Plausible::class)
        ->assertSee('Site Analytics');
});

it('hides the page heading on request', function () {
    FilamentPlausiblePagePlugin::get()->title('Site Analytics')->hidePageTitle();

    expect(Livewire::test(Plausible::class)->instance()->getHeading())->toBe('');
});

it('resolves the share url from the plugin before the config', function () {
    FilamentPlausiblePagePlugin::get()->plausibleShareUrl('https://plausible.io/share/override.com?auth=other');

    expect(FilamentPlausiblePagePlugin::get()->getPlausibleShareUrl())
        ->toBe('https://plausible.io/share/override.com?auth=other');
});

it('falls back to the config share url', function () {
    expect(FilamentPlausiblePagePlugin::get()->getPlausibleShareUrl())
        ->toBe('https://plausible.io/share/example.com?auth=token');
});

it('accepts a closure share url', function () {
    FilamentPlausiblePagePlugin::get()->plausibleShareUrl(fn () => 'https://plausible.io/share/closure.com?auth=c');

    expect(FilamentPlausiblePagePlugin::get()->getPlausibleShareUrl())
        ->toBe('https://plausible.io/share/closure.com?auth=c');
});

it('registers navigation by default', function () {
    expect(Plausible::shouldRegisterNavigation())->toBeTrue();
});

it('can be hidden from navigation with a bool or a closure', function () {
    FilamentPlausiblePagePlugin::get()->shouldRegisterNavigationUsing(false);
    expect(Plausible::shouldRegisterNavigation())->toBeFalse();

    FilamentPlausiblePagePlugin::get()->shouldRegisterNavigationUsing(fn () => true);
    expect(Plausible::shouldRegisterNavigation())->toBeTrue();
});

it('supports a string navigation group', function () {
    FilamentPlausiblePagePlugin::get()->navigationGroup('Reports');

    expect(Plausible::getNavigationGroup())->toBe('Reports');
});
