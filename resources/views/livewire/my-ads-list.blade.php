@php
    $filters = ['active', 'drafts', 'expired'];
@endphp

<section class="w-full">
    <div class="w-full p-6 pb-4 flex items-end">
        <div class="flex justify-between items-center w-full">
            <h1 class="text-lg uppercase font-medium ">{{ __('My Ads') }}</h1>
        </div>
    </div>
    <div class="px-6 mb-6">
        <div class="w-full rounded-xl bg-white min-h-[400px]">

            <div class="px-6 pt-6 border-b flex items-center gap-4 relative">
                @foreach ($filters as $item)
                    <a href="{{ '/my-ads' . '?filter=' . $item }}" @class([
                        'uppercase block pb-3 border-b-2 -mb-[1px] px-2',
                        'border-b-primary' => $loop->index == 0 || Request::get('filter') == $item,
                        'border-b-transparent' => Request::get('filter')
                            ? Request::get('filter') != $item
                            : $loop->index != 0,
                    ])>{{ $item }}</a>
                @endforeach
                <a href="{{ route('place-advertisement') }}" class="absolute top-4 right-6">
                    <x-button>{{ __('Create New') }}</x-button>
                </a>
            </div>

            <div class="p-6">
                <div class="mb-4">
                    <label class="relative flex w-[300px] rounded-full bg-gray-200 items-center px-3">
                        <x-icon-search />
                        <input type="text" placeholder="{{ __('Search...') }}"
                            class="bg-transparent focus:outline-0 border-none focus:border-none focus:ring-0 block flex-grow ring-0 h-12">
                    </label>
                </div>

                <ul class="grid grid-cols-1 gap-4">
                    @foreach ($ads as $ad)
                        <x-ads.ad-card :ad="$ad" adType="horses" />
                    @endforeach
                    @foreach ($transport_ads as $ad)
                        <x-ads.ad-card :ad="$ad" adType="transport" />
                    @endforeach
                    @foreach ($stable_ads as $ad)
                        <x-ads.ad-card :ad="$ad" adType="stable" />
                    @endforeach
                    @foreach ($real_estate_ads as $ad)
                        <x-ads.ad-card :ad="$ad" adType="real-estate" />
                    @endforeach
                    @foreach ($banner_ads as $ad)
                        <x-ads.ad-card :ad="$ad" adType="banner" />
                    @endforeach
                </ul>

                <div>
                    @if (count($ads) == 0 &&
                            count($transport_ads) == 0 &&
                            count($banner_ads) == 0 &&
                            count($stable_ads) == 0 &&
                            count($real_estate_ads) == 0)
                        <x-empty title="You have 0 ads" />
                    @endif
                </div>

            </div>

        </div>
    </div>
</section>
