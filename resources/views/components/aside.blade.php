@php
    $activepath = Request::segment(1);
@endphp

<div class="w-full h-full flex flex-col">
    <div class="h-[80px] w-full px-3 items-center justify-between flex border-r border-b bg-white">
        <a href="https://www.sporthorses.nl" target="_blank" rel="noopener noreferrer">

            @switch(app()->getLocale())
                @case('en')
                    <img src="/images/sporthorses-uk.svg" class="h-20 w-auto" />
                @break

                @case('nl')
                    <img src="/images/sporthorses-nl.svg" class="h-20 w-auto" />
                @break

                @case('be')
                    <img src="/images/sporthorses-be.svg" class="h-20 w-auto" />
                @break

                @case('at')
                    <img src="/images/sporthorses-at.svg" class="h-20 w-auto" />
                @break

                @case('bw')
                    <img src="/images/sporthorses-bw.svg" class="h-20 w-auto" />
                @break

                @case('ch')
                    <img src="/images/sporthorses-ch.svg" class="h-20 w-auto" />
                @break

                @case('zh')
                    <img src="/images/sporthorses-cn.svg" class="h-20 w-auto" />
                @break

                @case('de')
                    <img src="/images/sporthorses-de.svg" class="h-20 w-auto" />
                @break

                @case('fr')
                    <img src="/images/sporthorses-fr.svg" class="h-20 w-auto" />
                @break

                @case('uk')
                    <img src="/images/sporthorses-uk.svg" class="h-20 w-auto" />
                @break

                @default
                    <img src="/images/sporthorses-nl.svg" class="h-20 w-auto" />
            @endswitch
        </a>
    </div>
    <div class="px-2 py-4">
        <a href="{{ route('place-advertisement') }}"
            class=" w-full p-2 flex gap-2 items-center text-black rounded bg-primary mb-2">
            <x-icon-megaphone class="h-6 w-auto" />
            <span>{{ __('Place Advertisement') }}</span>
        </a>
        <a href="{{ route('dashboard') }}" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'dashboard',
        ])>
            <x-icon-dashboard class="h-6 w-auto" />
            <span>{{ __('Dashboard') }}</span>
        </a>
        <a href="{{ route('my-ads') }}" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'my-ads',
        ])>
            <x-icon-square-stack class="h-6 w-auto" />
            <span>{{ __('My Ads') }}</span>
        </a>
        <a href="{{ route('my-favorites') }}" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'my-favorites',
        ])>
            <x-icon-heart class="h-6 w-auto" />
            <span>{{ __('My Favorites') }}</span>
        </a>
        <a href="{{ route('invoice') }}" @class([
            ' w-full p-2 flex gap-2 items-center rounded hover:bg-black/5 mb-2',
            'bg-black/10 hover:bg-black/10' => $activepath == 'invoice',
        ])>
            <x-icon-dollar class="h-6 w-auto" />
            <span>{{ __('My Invoices') }}</span>
        </a>
    </div>
    <div class="grow"></div>
    <div class="p-4">
        <a href="{{ route('subscription') }}"
            class="rounded-md p-2 bg-gradient-to-r from-yellow-200 via-green-200 to-green-500 flex gap-2 items-center">
            <div class="rounded h-10 w-10 flex items-center justify-center bg-[#8ea22a]">
                <x-icon-lightning class="h-6 w-auto" />
            </div>
            <div>
                <h3 class="text-sm font-medium">{{ __('Subscribe') }}</h3>
                <p class="text-xs text-gray-600">{{ __('Stand out and sell more.') }}</p>
            </div>
        </a>
    </div>
</div>
