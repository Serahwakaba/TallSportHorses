@extends('layouts.admin')

@section('content')
    <section class="w-full">
        <div class="w-full p-6 pb-4">
            <div class="flex justify-between items-center w-full pb-2 border-b mb-4">
                <h1 class="text-lg uppercase font-medium ">{{ __('Analytics') }}</h1>
            </div>

            @livewire('ads-analytics')
        </div>
    </section>
@endsection
