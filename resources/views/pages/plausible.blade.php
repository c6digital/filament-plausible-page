<x-filament-panels::page>
    <div x-data="{
        theme: 'light',
        _url: @js($plugin->getPlausibleShareUrl()),
        init() {
            this.theme = localStorage.getItem('theme') || 'system'

            window.addEventListener('theme-changed', ($event) => {
                this.theme = $event.detail;
            })
        },
        get url() {
            return `${this._url}&embed=true&theme=${this.theme}&background=transparent`
        }
    }">
        <iframe plausible-embed x-bind:src="url" scrolling="no" frameborder="0" loading="lazy" allowtransparency="true" style="width: 1px; min-width: 100%; height: 1600px; color-scheme: light;"></iframe>

        @if($plugin->showPlausibleFooterMark)
            <div style="font-size: 14px; padding-bottom: 14px;">Stats powered by <a target="_blank" style="color: #4F46E5; text-decoration: underline;" href="https://plausible.io">Plausible Analytics</a></div>
        @endif
    </div>

    <script async src="https://plausible.io/js/embed.host.js"></script>
</x-filament-panels::page>
