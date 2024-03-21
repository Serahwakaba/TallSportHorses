<section class="grid md:grid-cols-[1fr_240px] gap-6 p-6 max-w-6xl mx-auto">

    <div class="w-full">
        <x-breadcrumbs title="{{ __('Settings') }}" :links="[]" />
        <div class="w-full rounded-xl bg-white p-6 border-b mt-4">
            <button type="button" onclick="history.back()"
                class="flex items-center gap-2 text-center rounded-full text-sm font-medium uppercase px-4 py-2.5 tracking-wider bg-gray-200 text-black mb-5">
                <x-icon-chevron-left class="h-5 w-auto" />
                {{ __('Back') }}
            </button>

            <section class="mt-6">
                <a href="{{ route('settings.subscription-packages') }}"
                    class="flex items-center w-full gap-4 p-2 rounded-md hover:bg-gray-100 mb-2">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                        <x-icon-dollar class="h-6 w-auto" />
                    </div>
                    <span>{{ __('Subscriptions') }}</span>
                    <div class="flex-grow"></div>
                    <x-icon-chevron-right class="h-5 w-auto" />
                </a>

                <a href="{{ route('settings.ad-packages') }}"
                    class="flex items-center w-full gap-4 p-2 rounded-md hover:bg-gray-100 mb-2">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                        <x-icon-megaphone class="h-6 w-auto" />
                    </div>
                    <span>{{ __('Advertising Packages') }}</span>
                    <div class="flex-grow"></div>
                    <x-icon-chevron-right class="h-5 w-auto" />
                </a>

                <a href="{{ route('settings.ad-addons') }}"
                    class="flex items-center w-full gap-4 p-2 rounded-md hover:bg-gray-100 mb-2">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                        <x-icon-plus class="h-6 w-auto" />
                    </div>
                    <span>{{ __('Advertising Addons') }}</span>
                    <div class="flex-grow"></div>
                    <x-icon-chevron-right class="h-5 w-auto" />
                </a>

                <a href="{{ route('settings.feeds') }}"
                    class="flex items-center w-full gap-4 p-2 rounded-md hover:bg-gray-100 mb-2">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                        <x-icon-rss class="h-6 w-auto" />
                    </div>
                    <span>{{ __('Ads Feeds') }}</span>
                    <div class="flex-grow"></div>
                    <x-icon-chevron-right class="h-5 w-auto" />
                </a>
            </section>
        </div>

    </div>

    <section>
        <div class="p-4 bg-white rounded-xl border">
            <x-icon-settings class="h-10 w-auto mb-4" />
            <h1 class="text-xl font-bold mb-4">{{ __('Settings') }}</h1>

            <div class="w-full p-2 bg-gray-200 flex items-center gap-4 rounded-full px-4">
                <span class="block w-3 h-3 rounded-full bg-green-500"></span>
                <span>All Systems Ok.</span>
            </div>
        </div>
    </section>

</section>
