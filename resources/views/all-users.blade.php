@extends('layouts.admin')

@section('content')
    <section class="w-full">
        <div class="w-full p-6 pb-4">
            <x-breadcrumbs title="{{ __('All Users') }}" :links="[]" />
            @livewire('all-users-list')
        </div>
    </section>
@endsection
