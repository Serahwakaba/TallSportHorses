<section class="grid md:grid-cols-[1fr_240px] gap-6 p-6 max-w-6xl mx-auto">

    <div class="w-full">
        <x-breadcrumbs title="{{ __('Advertising Addons') }}" :links="[['title' => 'Settings', 'slug' => '/settings']]" />
        <div class="w-full rounded-xl bg-white p-6 border-b mt-4">

            <section class="mt-6">
                @foreach ($addons as $item)
                    <div class="border rounded-xl mb-4">
                        <div class="p-4 border-b rounded-t-xl bg-gray-100">
                            <h3 class="font-bold">{{ $item->title }}</h3>
                        </div>
                        <div class="p-4">
                            <p class="mb-4">{{ $item->description }}</p>
                            <h3 class="text-sm uppercase text-gray-600 mb-2">{{ __('Validity') }}</h3>
                            <p class="mb-4">{{ $item->days_to_expiry }} {{ __('Days') }}</p>

                            <h3 class="text-sm uppercase text-gray-600 mb-2">{{ __('Price') }}</h3>
                            <price class="text-lg">£ {{ $item->price }}</price>
                        </div>

                        <div class="p-4 border-t">
                            <x-button>Edit</x-button>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>

    </div>

    <section>
        <div class="p-4 bg-white rounded-xl border">
            <x-icon-plus class="h-10 w-auto mb-4" />
            <h1 class="text-xl font-bold mb-4">{{ __('Advertising Addons') }}</h1>


        </div>
    </section>

</section>
