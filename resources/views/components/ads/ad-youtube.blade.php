@props(['videoLinks'])

<div x-data="{
    videos: @entangle($videoLinks),

}" x-init="if (!videos) {
    videos = [{ video_link: '' }]
}" class="w-full mt-1">
    <x-input type="text" class=" block w-full" x-model="videos[0].video_link" placeholder="Youtube Link" />
    <template x-for="(videoInput, index) in videos.filter((i,n )=> n !== 0)">
        <div :class="[{ 'hidden': index === 0 }]" class="w-full flex items-center mt-2 gap-2">
            <x-input type="text" class=" block w-[calc(100%-50px)]" x-model="videoInput.video_link"
                placeholder="Youtube Link" />
            <button type="button" x-on:click="videos = videos.filter((i,position) => position !== index)"
                class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                <x-icon-x-mark class="h-4 w-auto" />
            </button>
        </div>
    </template>
    <button x-on:click="videos = [...videos, {video_link:''}]" type="button"
        class="font-medium text-primary p-1 flex items-center gap-2 text-sm mt-2">
        <x-icon-plus class="h-4 w-auto" />
        <span>{{ __('Add Another Link') }}</span>
    </button>
</div>
