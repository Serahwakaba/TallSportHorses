@php
    $activepath = Request::segment(1);
    $user = Auth::user();
    $adTypesOptions = [
        __('Horses'),
        __('Ponies'),
        __('Friesian'),
        __('Transport'),
        __('Equestrian real estate'),
        __('Stabling and Grazing'),
        __('Banner'),
    ];
    $userFilterOptions = [__('All Users'), __('Subscribers'), __('Not Subscribed')];
    $activeFilter = request()->query('filter');
    $activeAdType = request()->query('adType');
@endphp

<div class="w-full h-full flex flex-col">
    <div class="h-[80px] w-full px-3 items-center justify-between flex border-r border-b bg-white">
        <a href="https://www.sporthorses.nl" target="_blank" rel="noopener noreferrer">
            <img src="/images/sporthorses.svg" class="h-14 w-auto" />
        </a>
        <a href="{{ route('home') }}"
            class="h-8 w-8 rounded-full border border-white/60e/60 hovere/80 flex justify-center items-center">
            <x-icon-arrow-up-right class="h-4 w-auto text-inherit" />
        </a>
    </div>
    <div class="px-2 py-4 max-h-[calc(100vh-180px)] overflow-y-auto">

        <a href="{{ route('dashboard') }}" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'dashboard',
        ])>
            <x-icon-dashboard class="h-6 w-auto" />
            <span>{{ __('Dashboard') }}</span>
        </a>
        <a href="/all-users" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'all-users',
        ])>
            <x-icon-user-group class="h-6 w-auto" />
            <span>{{ __('All Users') }}</span>
            <span class="flex-grow"></span>
            <x-icon-chevron-down class="h-5 w-auto" />
        </a>
        @if ($activepath == 'all-users')
            <div class="pl-4 mb-2">
                @foreach ($userFilterOptions as $item)
                    <a href="{{ '/all-users?filter=' . $item }}" @class([
                        ' w-full p-2 hover:bg-black/5 block',
                        'bg-black/10 hover:bg-black/10' => $activeFilter == $item,
                    ])>
                        <span>{{ $item }}</span>
                    </a>
                @endforeach
            </div>
        @endif

        <a href="/all-ads" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'all-ads',
        ])>
            <x-icon-square-stack class="h-6 w-auto" />
            <span>{{ __('All Ads') }}</span>
            <span class="flex-grow"></span>
            <x-icon-chevron-down class="h-5 w-auto" />
        </a>
        @if ($activepath == 'all-ads')
            <div class="pl-4 mb-2">
                @foreach ($adTypesOptions as $item)
                    <a href="{{ '/all-ads?adType=' . $item }}" @class([
                        ' w-full p-2 hover:bg-black/5 block',
                        'bg-black/10 hover:bg-black/10' => $activeAdType == $item,
                    ])>
                        <span>{{ $item }}</span>
                    </a>
                @endforeach
            </div>
        @endif

        <a href="/all-invoices" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'all-invoices',
        ])>
            <x-icon-dollar class="h-6 w-auto" />
            <span>{{ __('All Invoices') }}</span>
        </a>

        <a href="/analytics" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'analytics',
        ])>
            <x-icon-chart-pie class="h-6 w-auto" />
            <span>{{ __('Analytics') }}</span>
        </a>
        <a href="/settings" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'settings',
        ])>
            <x-icon-settings class="h-6 w-auto" />
            <span>{{ __('Settings') }}</span>
        </a>
    </div>
    <div class="grow"></div>
    <div class="p-4">
        <a href="{{ route('profile') }}" class="rounded-md p-2 border flex gap-2 items-center">
            <div class="rounded h-10 w-10 flex items-center justify-center bg-gray-200">
                <x-icon-user class="h-6 w-auto" />
            </div>
            <div>
                <h3 class="text-sm font-medium">{{ $user->name }}</h3>
                <p class="text-xs text-gray-600 font-bold uppercase">{{ $user->role }}</p>
            </div>
        </a>
    </div>
</div>
