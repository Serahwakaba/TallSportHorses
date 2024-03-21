<div>
    <button wire:click="$set('searchActive', 'true')"
        class="px-2 h-[46px] w-[300px] hover:ring-2 hover:ring-gray-300 bg-gray-200 rounded-full flex items-center gap-2 text-gray-400">
        <x-icon-search />
        <span>{{ __('Search...') }}</span>
    </button>
    <x-modal wire:model.live="searchActive">
        <div class="p-4">
            <label class="relative flex w-full rounded-full bg-gray-200 items-center px-3">
                <x-icon-search />
                <input type="text" placeholder="{{ __('Search...') }}" wire:model.live='searchText'
                    class="bg-transparent focus:outline-0 border-none focus:border-none focus:ring-0 block flex-grow ring-0">
            </label>
            {{ $searchText }}
        </div>
    </x-modal>
</div>
