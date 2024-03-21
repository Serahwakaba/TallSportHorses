@extends('layouts.base')


@section('body')
    <main class="w-full min-h-screen bg-gray-200">
        <x-ads-top-bar />

        @switch($category)
            @case('horses')
                @livewire('horse-ad-form')
            @break

            @case('ponies')
                @livewire('horse-ad-form')
            @break

            @case('friesian')
                @livewire('horse-ad-form')
            @break

            @case('transport')
                @livewire('create-transport-ad')
            @break

            @case('stabling-and-grazing')
                @livewire('create-stable-ad')
            @break

            @case('equestrian-real-estate')
                @livewire('create-real-estate-ad')
            @break

            @case('banner')
                @livewire('create-banner-ad')
            @break

            @default
                <span>Ad category not yet supported</span>
        @endswitch
    </main>
@endsection
