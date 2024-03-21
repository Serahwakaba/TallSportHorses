@extends('layouts.admin')

@section('content')
    <section class="w-full">
        <div class="w-full p-6 pb-4">
            <x-breadcrumbs title="{{ __('All Ads') }}" :links="[]" />

            <div class="flex justify-between items-center w-full pb-2 border-b mt-4">
                <h1 class="text-lg uppercase font-medium ">
                    {{ request()->query('adType') ? request()->query('adType') : __('All Ads') }}</h1>
            </div>
            @livewire('all-ads-list')
        </div>
    </section>
@endsection
