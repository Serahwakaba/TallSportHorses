<div class="w-full h-[80px] bg-white pr-4 items-center flex justify-between gap-4 sticky top-0 z-50">
    <div class="h-[80px] w-auto px-4 bg-secondary items-center justify-between flex border-r border-r-black/10">
        <a href="https://www.sporthorses.nl" target="_blank" rel="noopener noreferrer">
            <img src="/images/sporthorses.svg" class="h-14 w-auto" />
        </a>

    </div>
    <button onclick="history.back()" class="flex items-center gap-2">
        <div
            class="h-8 w-8 rounded-full border border-black/60 text-black/60 hover:text-black/80 flex justify-center items-center">
            <x-icon-chevron-left class="h-4 w-auto text-inherit" />
        </div>
        <span>{{ __('Back') }}</span>
    </button>
    <div class="flex-grow"></div>
    <livewire:language-selector />
    <livewire:user-profile />
</div>
