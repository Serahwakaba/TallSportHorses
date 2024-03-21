@props(['performance'])

<div x-data="{
    achievements: @entangle($performance)
}" x-init="if (!achievements) {
    achievements = [
        { event: '', year: '', category: '', position: '' }
    ]
}" class="w-full">
    <template x-for="(achievement, index) in achievements">
        <div class="w-full flex items-center mt-2 gap-2">
            <div class="w-[calc(100%-50px)] grid gap-1 grid-cols-4">
                <x-input type="text" class="block" x-model="achievement.event" placeholder="{{ __('Event') }}" />
                <x-input type="text" class="block" x-model="achievement.year" placeholder="{{ __('Year') }}" />
                <x-input type="text" class="block" x-model="achievement.category"
                    placeholder="{{ __('Category') }}" />
                <x-input type="text" class="block" x-model="achievement.position"
                    placeholder="{{ __('Finish Position') }}" />
            </div>
            <button type="button" x-bind:disabled="index === 0"
                x-on:click="achievements = achievements.filter((i,position) => position !== index)"
                class="h-10 w-10 disabled:text-gray-300 disabled:cursor-not-allowed rounded-full bg-gray-200 flex items-center justify-center">
                <x-icon-x-mark class="h-4 w-auto" />
            </button>
        </div>
    </template>
    <button x-on:click="achievements = [...achievements, { event: '', year: '', category: '', position: '' }]"
        type="button" class="font-medium text-primary p-1 flex items-center gap-2 text-sm mt-2">
        <x-icon-plus class="h-4 w-auto" />
        <span>{{ __('Add Another') }}</span>
    </button>
</div>
