<section class="w-full">
    <div class=" p-6 pb-4 flex items-end">
        <div class="flex justify-between w-full">
            <h1 class="text-lg uppercase font-medium">{{ __('My Favorites') }}</h1>

        </div>
    </div>
    <div class="px-6">
        <div class="w-full rounded-xl bg-white p-6">
            <x-empty title="You have not saved any ads">
                <a href=""><x-button>{{ __('Browse Ads') }}</x-button></a>
            </x-empty>
        </div>
    </div>
</section>
