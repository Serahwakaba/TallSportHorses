<section class="grid md:grid-cols-[1fr_240px] gap-6 p-6 max-w-6xl mx-auto">

    <div class="w-full">
        <x-breadcrumbs title="{{ __('RSS Feeds') }}" :links="[['title' => 'Settings', 'slug' => '/settings']]" />
        <div class="w-full rounded-xl bg-white p-6 border-b mt-4">

            <section class="mt-6">
                <div class="flex w-full items-center p-4 hover:bg-gray-100 bg-gray-50 mb-1 rounded justify-between">
                    <div class="flex items-center gap-2">
                        <h3>Top Ads</h3>
                        <a href="/feed" class="hover:primary">
                            <x-icon-external-link class="h-4 w-auto" />
                        </a>
                    </div>

                    <x-switch />
                </div>

                <div class="flex w-full items-center p-4 hover:bg-gray-100 bg-gray-50 mb-1 rounded justify-between">
                    <div class="flex items-center gap-2">
                        <h3>All Ads</h3>
                        <a href="/feed" class="hover:primary">
                            <x-icon-external-link class="h-4 w-auto" />
                        </a>
                    </div>

                    <x-switch />
                </div>
            </section>
        </div>

    </div>

    <section>
        <div class="p-4 bg-white rounded-xl border">
            <x-icon-rss class="h-10 w-auto mb-4" />
            <h1 class="text-xl font-bold mb-4">{{ __('Advertising Feeds') }}</h1>


        </div>
    </section>

</section>
