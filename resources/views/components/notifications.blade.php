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
        <x-icon-bell class="h-7 w-7" />
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
                <h2 class="text-gray-600 font-medium uppercase mb-4 text-xs">{{ __('Notifications') }}</h2>
                <div class="h-[200px]"></div>
            </div>
        </div>
    </div>
</div>
