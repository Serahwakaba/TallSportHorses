@props(['title' => 'Not Found'])

<div class="w-full py-16 text-center">
    <x-icon-search-empty class="h-16 w-auto mb-4 inline-block" />
    <h2 class="block text-center w-full font-medium text-lg mb-4">{{ $title }}</h2>
    <div class="flex justify-center">
        {{ $slot }}
    </div>
</div>
