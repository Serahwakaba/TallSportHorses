@extends('layouts.base')


@section('body')
    <main class="w-full min-h-screen bg-gray-200">
        <x-ads-top-bar />

        @switch($category)
            @case('horses')
                <livewire:update-horse-ad :ad="$ad" />
            @break

            @case('ponies')
                <livewire:update-horse-ad :ad="$ad" />
            @break

            @case('friesian')
                <livewire:update-horse-ad :ad="$ad" />
            @break

            @case('transport')
                <livewire:update-transport-ad :ad="$ad" />
            @break

            @case('real-estate')
                <livewire:update-real-estate-ad :ad="$ad" />
            @break

            @case('banner')
                <livewire:update-banner-ad :ad="$ad" />
            @break

            @case('stable')
                <livewire:update-stable-ad :ad="$ad" />
            @break

            @default
                <span>Ad category not yet supported</span>
        @endswitch
    </main>
@endsection
