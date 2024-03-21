<section class="grid gap-4 p-6 max-w-6xl mx-auto">

    <x-breadcrumbs title="{{ __('Manage Ad') }}" :links="[['title' => 'All Ads', 'slug' => '/all-ads']]" />

    <div class="w-full">
        <div class="w-full rounded-xl bg-white p-6 border-b">


            <div class="mb-4">
                <h2 class="font-medium text-2xl mb-2">#{{ $ad->id }}: {{ $ad->title }}</h2>
                <p class="text-gray-600 text-sm uppercase">{{ $ad->category }}</p>

            </div>

            <div class="md:w-1/2 mb-6">
                <div class="flex items-end gap-2 mb-4">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Created At') }}</h3>
                    <div class="flex-grow border-b border-dashed"></div>
                    <span class="text-black">{{ $ad->created_at->format('M d, Y') }}</span>
                </div>
                <div class="flex items-end gap-2 mb-4">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Active') }}</h3>
                    <div class="flex-grow border-b border-dashed"></div>
                    <span class="text-black">{{ $ad->published ? __('Yes') : __('No') }}</span>
                </div>
                <div class="flex items-end gap-2 mb-4">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Expiry Date') }}</h3>
                    <div class="flex-grow border-b border-dashed"></div>
                    <span
                        class="text-black">{{ isset($ad['publish_date'])? Carbon\Carbon::parse($ad['publish_date'])->addDays(180)->format('d M Y'): __('Not Published') }}</span>
                </div>
            </div>

            <section class="grid grid-cols-3 gap-4">
                <div class="p-4 bg-green-600 text-white rounded-xl">
                    <div class="h-10 w-10 mb-3 bg-white/10 rounded-full flex items-center justify-center">
                        <x-icon-chart-pie class="h-5 w-auto" />
                    </div>
                    <h4 class="text-white/80 text-sm mb-2">{{ __('Ad Views') }}</h4>
                    <span class="capitalize">{{ $ad->views ? $ad->views : 0 }}</span>
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



            <div class="flex justify-around w-full mt-6">
                <a href="/invoice/{{ $ad->invoice ? $ad->invoice->id : '' }}" class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full bg-gray-200 group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-dollar class="h-6 w-auto" />
                    </div>
                    <span class="block text-base">{{ __('Invoice') }}</span>
                </a>
                <a target="_blank" rel="noopener noreferrer"
                    href="{{ 'https://www.sporthorses.nl' . '/ads' . '/' . $ad->id }}" class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full bg-gray-200 group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-eye class="h-6 w-auto" />
                    </div>
                    <span class="block text-base">{{ __('Preview') }}</span>
                </a>
                <a href="{{ '/all-users' . '/' . $ad->user->id }}" class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full bg-gray-200 group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-user class="h-6 w-auto" />
                    </div>
                    <span class="block text-base">{{ __('View User') }}</span>
                </a>
                <button wire:click="$set('showEditOptions',{{ $showEditOptions ? 'false' : 'true' }})"
                    class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full {{ $showEditOptions ? 'bg-primary' : 'bg-gray-200' }} group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-edit class="h-6 w-auto" />
                    </div>
                    <span class="block text-base">{{ __('Edit') }}</span>
                </button>
            </div>

            @if ($showEditOptions)
                <div class="mt-4 border p-4 rounded-xl flex flex-wrap gap-4">
                    @if ($ad->published)
                        <x-button wire:click="togglePublish"> {{ __('Unpublish') }}</x-button>
                    @else
                        <x-button wire:click="togglePublish"> {{ __('Publish') }}</x-button>
                    @endif
                    <x-button wire:click="delete"> {{ __('Delete') }}</x-button>
                </div>
            @endif


        </div>

        <div class="w-full rounded-xl bg-white p-6 border-b mt-5">
            <h3 class="text-sm text-gray-600 uppercase mb-2 font-bold">{{ __('Ad Data') }}</h3>

            <div class="rounded-xl border w-full grid grid-cols-[1fr_2fr] mb-4">
                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('ID') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $ad->id }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Title') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $ad->title }}</div>

                <div class="p-3 border-b  border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Category') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $ad->category }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Price') }}</h3>
                </div>
                <div class="p-3 border-b">£ {{ $ad->price }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Created By') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $ad->user->name }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Country') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $ad->user->country }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Description') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $ad->description['english'] }}</div>

            </div>
        </div>

    </div>


</section>
