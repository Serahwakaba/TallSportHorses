@props(['ad', 'adType' => 'horses'])

<li class="border rounded-md flex">
    <div class="w-[240px] relative">
        <div class="absolute top-2 left-2">
            <span @class([
                'text-sm inline-block p-1 px-2.5 rounded-full uppercase',
                'bg-green-600 text-white' => $ad['published'],
                'bg-gray-200 text-black' => !$ad['published'],
            ])>{{ $ad['published'] ? __('Active') : __('Draft') }}</span>
        </div>
        @if (empty($ad['images']))
            <img src="/images/horse-bw.jpg" alt="horse" class="h-full w-full opacity-30 object-cover rounded-l-md">
        @else
            <img src={{ array_values($ad['images'])[0] }} alt="horse" class="h-full w-full object-cover rounded-l-md">
        @endif
    </div>
    <div class="p-4 flex-grow">
        <div class="mb-3 flex gap-2 items-center left-2 top-2 w-full">
            <span
                class="text-sm block uppercase p-1 px-2.5 rounded-full bg-secondary text-white">{{ $adType }}</span>
            <span
                class="text-sm block uppercase p-1 px-2.5 rounded-full bg-primary text-white">{{ $ad['category'] }}</span>


            <div class="flex-grow"></div>
            <span class="text-sm text-gray-600 block">{{ date('d M Y', strtotime($ad['created_at'])) }}</span>

        </div>
        <h3 class="font-medium text-base mb-1 block">{{ $ad['title'] }}
        </h3>



        <div class="flex gap-6 mt-4">
            <span class="text-sm text-gray-600 block mb-1">{{ __('Price') }}: € {{ $ad['price'] }}</span>
            <span class="text-sm text-gray-600 block mb-1">{{ __('Age') }}: {{ $ad['age'] }}</span>
            <span class="text-sm text-gray-600 block mb-1">Level: {{ $ad['level'] }}</span>
            <span class="text-sm text-gray-600 block">Gender: {{ $ad['gender'] }}</span>
        </div>
        <div class="flex gap-4 mt-4">
            <a href="{{ '/ads' . '/' . $adType . '/' . $ad['id'] . '?activeTab=EDITOR' }}"
                class="h-10 px-4 gap-2 hover:bg-primary rounded-full border flex items-center uppercase text-sm">
                <x-icon-edit class="h-4 w-auto" />
                <span>{{ __('Edit') }}</span>
            </a>
            @if ($ad->published)
                <a href="{{ '/ads' . '/' . $adType . '/' . $ad['id'] . '?activeTab=MANAGE' }}"
                    class="h-10 px-4 gap-2 bg-orange-600 text-white rounded-full border flex items-center uppercase text-sm">
                    <x-icon-eye class="h-4 w-auto" />
                    <span>{{ __('Promotion') }}</span>
                </a>
            @endif
            <div class="flex-grow"></div>
            <x-ads.ad-delete-button :adType="$adType" :adID="$ad['id']" />
        </div>
    </div>

</li>
