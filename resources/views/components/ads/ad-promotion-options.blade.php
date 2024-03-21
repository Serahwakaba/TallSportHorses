@props(['selectedPackage' => 'Plus', 'publishAddons' => ['STANDARD_CATEGORY', 'HOMEPAGE_AD']])

@php
    $packages = [['title' => 'Standard', 'copy' => 'Standard visibility', 'price' => 9.5, 'features' => ['180 days on Sporthorses']], ['title' => 'Plus', 'copy' => 'Higher visibility', 'price' => 29.5, 'features' => ['180 days on Sporthorses', 'Viewed up to 6 times more often', '7 days on the homepage of Sporthorses']], ['title' => 'Premium', 'copy' => 'Higher visibility + social media', 'price' => 49.5, 'features' => ['180 days on Sporthorses', 'Viewed up to 15 times more often', '7 days on the homepage of Sporthorses', 'Shown on our Facebook channel']]];

    $addons = [
        [
            'title' => 'Standard Category',
            'key' => 'STANDARD_CATEGORY',
            'description' => 'Your ad visible on our websites',
            'price' => 0.0,
            'days_to_expiry' => 180,
        ],
        [
            'title' => 'Homepage Advert',
            'key' => 'HOMEPAGE_AD',
            'description' => 'Your ad visible on our websites',
            'price' => 0.0,
            'days_to_expiry' => 7,
        ],
        [
            'title' => 'Website Link',
            'key' => 'WEBSITE_LINK',
            'description' => 'Submit your site to your ad',
            'price' => 6.5,
            'days_to_expiry' => 180,
        ],
        [
            'title' => 'Label',
            'key' => 'LABEL',
            'description' => 'Add label to your ad',
            'price' => 3.95,
            'days_to_expiry' => 180,
        ],
        [
            'title' => 'Top Advert',
            'key' => 'TOP_AD',
            'description' => 'Your ad is at the top of Top adverts',
            'price' => 25.0,
            'days_to_expiry' => 7,
        ],
        [
            'title' => 'Facebook',
            'key' => 'FACEBOOK',
            'description' => 'Your advertisement is shown on our Facebook page',
            'price' => 25.0,
            'days_to_expiry' => 0,
        ],
        [
            'title' => 'Instagram',
            'key' => 'INSTAGRAM',
            'description' => 'Your advertisement is shown on our Instagram page',
            'price' => 25.0,
            'days_to_expiry' => 0,
        ],
        [
            'title' => 'Twitter',
            'key' => 'TWITTER',
            'description' => 'Your advertisement is shown on our Twitter account',
            'price' => 15.0,
            'days_to_expiry' => 0,
        ],
        [
            'title' => 'Pinterest',
            'key' => 'PINTEREST',
            'description' => 'Your advertisement is shown on our Pinterest page',
            'price' => 15.0,
            'days_to_expiry' => 0,
        ],
        [
            'title' => 'Newsletter',
            'key' => 'NEWSLETTER',
            'description' => 'Your advertisement is shown in our newsletter (105,000 registrations)',
            'price' => 35.0,
            'days_to_expiry' => 0,
        ],
    ];
@endphp

<section x-data="{
    selectedPackage: @entangle($selectedPackage),
    publishAddons: @entangle($publishAddons),
    toggleAddon(v) {
        if (this.publishAddons.includes(v)) {
            this.publishAddons = this.publishAddons.filter(i => i !== v)
        } else {
            this.publishAddons = [...this.publishAddons, v]
        }
    },
}" x-init="function() {
    if (!selectedPackage) {
        selectedPackage = 'Plus'
    }

    if (!publishAddons) {
        publishAddons = ['STANDARD_CATEGORY', 'HOMEPAGE_AD']
    }
}">
    <div class="w-full grid gap-4 grid-cols-3">
        @foreach ($packages as $package)
            <button type="button" x-on:click="selectedPackage = '{{ $package['title'] }}'"
                class="border rounded ring-primary flex flex-col w-full text-start relative"
                :class="'{{ $package['title'] }}' === selectedPackage && 'ring-2'">
                <div class="p-4 border-b w-full">
                    <h3 class="text-xl font-bold mb-2">{{ $package['title'] }}</h3>
                    <p class="text-sm text-gray-600">{{ $package['copy'] }}</p>

                    <template x-if="'{{ $package['title'] }}' === selectedPackage">
                        <x-icon-check class="inline h-8 absolute top-4 right-4 w-auto" />
                    </template>
                </div>
                <div class="p-4 w-full">
                    <ul>
                        @foreach ($package['features'] as $feature)
                            <li class="text-sm block mb-2">
                                {{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex-grow"></div>
                <div class="p-4 border-t w-full">
                    <span>£{{ $package['price'] }}</span>
                </div>
            </button>
        @endforeach
    </div>

    <div class="mt-6">
        <h2 class="text-lg uppercase font-medium mb-4">Addons</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($addons as $item)
                <button x-on:click="toggleAddon('{{ $item['key'] }}')"
                    class="border rounded flex flex-col text-start hover:ring ring-primary" type="button">
                    <div class="p-4">
                        <template x-if="[...publishAddons].includes('{{ $item['key'] }}')">
                            <x-icon-check class="inline h-6 w-auto mb-4" />
                        </template>
                        <template x-if="![...publishAddons].includes('{{ $item['key'] }}')">
                            <x-icon-check class="inline h-6 w-auto mb-4 grayscale" />
                        </template>

                        <h3 class="text-base font-bold mb-2">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $item['description'] }}</p>
                        <p class="text-sm text-gray-600">
                            {{ $item['days_to_expiry'] !== 0 ? $item['days_to_expiry'] : '' }}
                        </p>

                    </div>
                    <div class="flex-grow"></div>
                    <div class="p-4 border-t w-full">
                        <span>£{{ $item['price'] }}</span>
                    </div>
                </button>
            @endforeach
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-lg uppercase font-medium mb-4">Total</h2>
        <div class="w-full p-4 border border-dashed">
            <span class="block text-2xl font-bold mb-4">Total: £ 29.50</span>
            <button type="button" @click="$dispatch('published')"
                class="w-full text-center rounded-full bg-green-600 text-white text-sm font-medium uppercase py-2.5 tracking-wider disabled:cursor-not-allowed disabled:bg-gray-200 disabled:text-black mt-3">
                {{ __('Place Advert') }}
            </button>
        </div>
    </div>
</section>
