@props(['data' => []])

<div class="w-full mb-16">

    <section class="grid grid-cols-3 gap-4">
        <div class="p-4 bg-green-600 text-white rounded-xl">
            <div class="h-10 w-10 mb-3 bg-white/10 rounded-full flex items-center justify-center">
                <x-icon-chart-pie class="h-5 w-auto" />
            </div>
            <h4 class="text-white/80 text-sm mb-2">{{ __('Ad Views') }}</h4>
            <span class="capitalize">{{ $data->views ? $data->views : 0 }}</span>
        </div>
        <div class="p-4 bg-cyan-600 text-white rounded-xl">
            <div class="h-10 w-10 mb-3 bg-white/10 rounded-full flex items-center justify-center">
                <x-icon-phone class="h-5 w-auto" />
            </div>
            <h4 class="text-white/80 text-sm mb-2">{{ __('Phone Clicks') }}</h4>
            <span class="capitalize">{{ 0 }}</span>
        </div>
        <div class="p-4 bg-indigo-600 text-white rounded-xl">
            <div class="h-10 w-10 mb-3 bg-white/10 rounded-full flex items-center justify-center">
                <x-icon-email class="h-5 w-auto" />
            </div>
            <h4 class="text-white/80 text-sm mb-2">{{ __('Email Clicks') }}</h4>
            <span class="capitalize">{{ 0 }}</span>
        </div>
    </section>

    <section class="bg-white rounded-xl border mt-6 p-6">
        <h3 class="font-medium text-xl mb-1 block">{{ $data['title'] }}
        </h3>

        <div class="flex gap-6 mt-4">
            <span class="text-base text-gray-600 block mb-1">{{ __('Price') }}: € {{ $data['price'] }}</span>
            <span class="text-base text-gray-600 block mb-1">{{ __('Category') }}: {{ $data['category'] }}</span>
            <span class="text-base text-gray-600 block mb-1">{{ __('Date') }}:
                {{ date('d M Y', strtotime($data['created_at'])) }}</span>
            <span class="text-base text-gray-600 block mb-1">{{ __('Expiry') }}:
                {{ isset($data['publish_date'])? Carbon\Carbon::parse($data['publish_date'])->addDays(180)->format('d M Y'): __('No Expiry') }}</span>
        </div>

        <div class="flex gap-4 mt-4">

            <button type="button"
                class="h-10 px-4 gap-2 hover:bg-primary rounded-full border flex items-center uppercase text-sm">
                <x-icon-megaphone class="h-4 w-auto" />
                <span>{{ __('Unpublish') }}</span>
            </button>

            <button type="button"
                class="h-10 px-4 gap-2 hover:bg-primary rounded-full border flex items-center uppercase text-sm">
                <x-icon-trash class="h-4 w-auto" />
                <span>{{ __('Delete') }}</span>
            </button>
        </div>

    </section>

    <section class="bg-white rounded-xl border mt-6">
        <div class="flex justify-between items-center p-6 border-b last:border-b-0">
            <div>
                <h3 class="text-black text-lg font-semibold mb-1">{{ __('Top Ad') }}</h3>
                <p class="text-sm text-gray-600">{{ __('Get shown at the top and find more customers.') }}</p>
            </div>
            <div class="flex items-center gap-2">
                <price class="text-lg font-semibold">
                    € 4.50
                </price>
                <button type="button" class="border px-6 py-3 bg-primary font-semibold rounded-md uppercase text-sm">
                    {{ __('Pay') }}
                </button>
            </div>
        </div>
        <div class="flex justify-between items-center p-6 border-b last:border-b-0">
            <div>
                <h3 class="text-black text-lg font-semibold mb-1">{{ __('Reset Publish Date') }}</h3>
                <p class="text-sm text-gray-600">{{ __('Reset publish date so that your ad is shown at the top') }}</p>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" class="border px-6 py-3 bg-primary font-semibold rounded-md uppercase text-sm">
                    {{ __('Reset') }}
                </button>
            </div>
        </div>
    </section>
</div>
