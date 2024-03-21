<div x-data="{
    popoverOpen: false,
    popoverArrow: true,
    popoverPosition: 'bottom',
    popoverHeight: 0,
    popoverOffset: 8,
    popoverHeightCalculate() {
        this.$refs.popover.classList.add('invisible');
        this.popoverOpen = true;
        let that = this;
        $nextTick(function() {
            that.popoverHeight = that.$refs.popover.offsetHeight;
            that.popoverOpen = false;
            that.$refs.popover.classList.remove('invisible');
            that.$refs.popoverInner.setAttribute('x-transition', '');
            that.popoverPositionCalculate();
        });
    },
    popoverPositionCalculate() {
        if (window.innerHeight < (this.$refs.popoverButton.getBoundingClientRect().top + this.$refs.popoverButton.offsetHeight + this.popoverOffset + this.popoverHeight)) {
            this.popoverPosition = 'top';
        } else {
            this.popoverPosition = 'bottom';
        }
    }
}" x-init="that = this;
window.addEventListener('resize', function() {
    popoverPositionCalculate();
});
$watch('popoverOpen', function(value) {
    if (value) {
        popoverPositionCalculate();
        document.getElementById('width').focus();
    }
});" class="relative z-50">

    <button x-ref="popoverButton" @click="popoverOpen=!popoverOpen"
        class="flex items-center justify-center w-[46px] h-[46px] bg-neutral-100 rounded-full cursor-pointer hover:bg-neutral-100 focus-visible:ring-gray-400 focus-visible:ring-2 focus-visible:outline-none active:bg-white border-neutral-200/70">
        <x-icon-user class="h-7 w-7" />
    </button>

    <div x-ref="popover" x-show="popoverOpen" x-init="setTimeout(function() { popoverHeightCalculate(); }, 100);" x-trap.inert="popoverOpen"
        @click.away="popoverOpen=false;" @keydown.escape.window="popoverOpen=false"
        :class="{ 'top-0 mt-14': popoverPosition == 'bottom', 'bottom-0 mb-12': popoverPosition == 'top' }"
        class="absolute w-[300px] max-w-lg right-0" x-cloak>
        <div x-ref="popoverInner" x-show="popoverOpen"
            class="w-full p-4 bg-white border rounded-md shadow-sm border-neutral-200/70">
            <div x-show="popoverArrow && popoverPosition == 'bottom'"
                class="absolute top-0 inline-block w-5 mt-px overflow-hidden -translate-x-2 -translate-y-2.5 right-0">
                <div class="w-2.5 h-2.5 origin-bottom-left transform rotate-45 bg-white border-t border-l rounded-sm">
                </div>
            </div>
            <div x-show="popoverArrow  && popoverPosition == 'top'"
                class="absolute bottom-0 inline-block w-5 mb-px overflow-hidden -translate-x-2 translate-y-2.5 right-0">
                <div class="w-2.5 h-2.5 origin-top-left transform -rotate-45 bg-white border-b border-l rounded-sm">
                </div>
            </div>
            <div class="block">
                <div class="flex gap-2 items-center">
                    <div
                        class="h-12 w-12 rounded-md inline-flex justify-center items-center bg-gradient-to-r from-rose-100 to-teal-100">
                        <x-icon-user-simple class="h-8 w-auto" />
                    </div>
                    <div>
                        <h3 class="font-medium">{{ $username }}</h3>
                        <p class="text-sm text-gray-600">{{ $email }}</p>
                    </div>
                </div>
                <hr class="my-4 block border-gray-200">
                <a href="{{ route('profile') }}" class="py-3 w-full flex gap-2 items-center text-black">
                    <x-icon-user class="h-6 w-auto" />
                    <span>{{ __('My Profile') }}</span>
                    <div class="flex-grow"></div>
                    <x-icon-chevron-right />
                </a>
                <a href="{{ route('subscription') }}" class="py-3 w-full flex gap-2 items-center text-black">
                    <x-icon-lightning class="h-6 w-auto" />
                    <span>{{ __('Subscribe') }}</span>
                    <div class="flex-grow"></div>
                    <x-icon-chevron-right />
                </a>
                <a href="{{ route('profile') }}" class="py-3 w-full flex gap-2 items-center text-black">
                    <x-icon-settings class="h-6 w-auto" />
                    <span>{{ __('Account Settings') }}</span>
                    <div class="flex-grow"></div>
                    <x-icon-chevron-right />
                </a>
                <a href="mailto:info@sporthorses.nl" class="py-3 w-full flex gap-2 items-center text-black">
                    <x-icon-chat class="h-6 w-6" />
                    <span>{{ __('Support') }}</span>
                    <div class="flex-grow"></div>
                    <x-icon-chevron-right />
                </a>
                <hr class="my-4 block border-gray-200">
                <div class="grid grid-cols-1 gap-2">

                    <x-logout-btn />
                </div>
            </div>
        </div>
    </div>
</div>
