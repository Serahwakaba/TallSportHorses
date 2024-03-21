@php
    $user = Auth::user();
@endphp

<section class="w-full">
    <div class="w-full p-6 pb-4 flex items-end">
        <div class="flex justify-between w-full">
            <h1 class="text-2xl font-medium">{{ __('Welcome') }}, {{ $user->name }}</h1>
        </div>
    </div>

    <div class="px-6 mb-6">


        <section class="bg-white rounded-xl min-h-[200px]">
            <div class="p-4 border-b flex justify-between items-center">
                @can('isUser')
                    <h2 class="uppercase font-medium">{{ __('My Ads') }}</h2>
                    <a href="{{ route('my-ads') }}"
                        class="flex gap-2 items-center uppercase text-sm text-gray-700 font-medium hover:text-primary">
                        <span>View All</span>
                        <x-icon-chevron-right class="h-4 w-auto" />
                    </a>
                @else
                    <h2 class="uppercase font-medium">{{ __('Ads Snapshot') }}</h2>
                @endcan

            </div>
            <section class="grid gap-4 grid-cols-4 p-4">
                <div
                    class="bg-white p-4 border-b-2 rounded-t-xl border-b-primary bg-gradient-to-t from-primary/10 to-primary/5">
                    <div class="h-10 w-10 mb-2 rounded-xl flex items-center justify-center bg-blue-500 text-white">
                        <x-icon-ad class="h-5 w-auto" />
                    </div>
                    <h3 class="text-sm text-gray-600 mb-2 capitalize">{{ __('Total Ads') }}</h3>
                    <span class="block text-5xl font-bold">{{ $ads_count }}</span>
                </div>
                <div
                    class="bg-white p-4 border-b-2 rounded-t-xl border-b-primary bg-gradient-to-t from-primary/10 to-primary/5">
                    <div class="h-10 w-10 mb-2 rounded-xl flex items-center justify-center bg-orange-500 text-white">
                        <x-icon-impressions class="h-5 w-auto" />
                    </div>
                    <h3 class="text-sm text-gray-600 mb-2 capitalize">{{ __('Ads Impressions') }}</h3>
                    <span class="block text-5xl font-bold">{{ $views_count }}</span>
                </div>
                <div
                    class="bg-white p-4 border-b-2 rounded-t-xl border-b-primary bg-gradient-to-t from-primary/10 to-primary/5">
                    <div class="h-10 w-10 mb-2 rounded-xl flex items-center justify-center bg-purple-500 text-white">
                        <x-icon-phone class="h-5 w-auto" />
                    </div>
                    <h3 class="text-sm text-gray-600 mb-2 capitalize">{{ __('Total Leads') }}</h3>
                    <span class="block text-5xl font-bold">{{ $leads_count }}</span>
                </div>
                <div
                    class="bg-white p-4 border-b-2 rounded-t-xl border-b-primary bg-gradient-to-t from-primary/10 to-primary/5">
                    <div class="h-10 w-10 mb-2 rounded-xl flex items-center justify-center bg-green-500 text-white">
                        <x-icon-email class="h-5 w-auto" />
                    </div>
                    <h3 class="text-sm text-gray-600 mb-2 capitalize">{{ __('Total Messages') }}</h3>
                    <span class="block text-5xl font-bold">{{ $messages_count }}</span>
                </div>
            </section>

            @can('isUser')
                <section class="py-6 px-4">
                    <h2 class="uppercase font-medium mb-4">({{ $ads_count }}) {{ __('Ads') }}</h2>
                    @if ($ads_count == 0)
                        <x-empty title="{{ __('You have 0 ads') }}" />
                    @else
                        <ul class="grid grid-cols-1 gap-4">
                            @foreach ($ads as $ad)
                                <x-ads.ad-card :ad="$ad" />
                            @endforeach
                        </ul>
                    @endif
                </section>
            @endcan

        </section>

        @can('isUser')
            <section class="grid gap-4 grid-cols-2 mt-4">
                <div class="bg-white rounded-xl min-h-[200px]">
                    <div class="p-4 border-b flex justify-between items-center">
                        <h2 class="uppercase font-medium">{{ __('My Invoices') }}</h2>
                        <a href="{{ route('invoice') }}"
                            class="flex gap-2 items-center uppercase text-sm text-gray-700 font-medium hover:text-primary">
                            <span>{{ __('View All') }}</span>
                            <x-icon-chevron-right class="h-4 w-auto" />
                        </a>
                    </div>
                    @if ($invoices->count() == 0)
                        <x-empty title="You have 0 invoices" />
                    @endif
                    @foreach ($invoices as $invoice)
                        <div class="p-3 even:bg-gray-50 flex items-center justify-between">
                            <div class="flex gap-4 items-center">
                                <span
                                    class="text-gray-700 flex items-center">{{ $invoice->created_at->format('M d, Y') }}</span>
                                <span class="text-gray-700 flex items-center">€
                                    {{ isset($invoice->total) ? $invoice->total : '0.00' }}</span>
                                <span
                                    class="block p-2 px-3 rounded-full font-semibold text-xs uppercase {{ $invoice['paid'] || $invoice['total'] == 0 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                    {{ $invoice['paid'] || $invoice['total'] == 0 ? __('Paid') : __('Not Paid') }}
                                </span>


                            </div>
                            <a target="_blank" href="{{ '/api/invoice/download' . '/' . $invoice->id }}"
                                class="text-green-600 cursor-pointer flex items-center font-semibold tracking-wider text-sm uppercase">
                                {{ __('Download') }}</a>
                        </div>
                    @endforeach
                </div>
                <div class="bg-white rounded-xl min-h-[200px]">
                    <div class="w-full rounded-t-xl bg-primary  from-green-200 via-green-300 to-blue-500 h-[100px]">
                    </div>
                    <div class="w-[100px] h-[100px] rounded-full border-4 border-white -mt-[50px] bg-gray-200 mx-auto">
                        <div class="flex w-full h-full items-center justify-center">
                            <x-icon-user-feather class="h-14 w-auto stroke-[0.5]" />
                        </div>
                    </div>
                    <div class="p-2 text-center pb-4">
                        <h2 class="font-medium text-sm mb-1">{{ $user->name }}</h2>
                        <span class="block text-sm text-gray-600 text-center mb-4">{{ $user->email }}</span>
                        <a href="{{ route('profile') }}"
                            class="p-2 px-4 rounded-full bg-gray-200 text-sm hover:bg-primary">
                            {{ __('Edit Profile') }}
                        </a>
                    </div>
                </div>
            </section>
        @endcan

        @can('isAdmin')
            <hr class="w-full my-4">
            @livewire('ads-analytics')
        @endcan
    </div>
</section>
