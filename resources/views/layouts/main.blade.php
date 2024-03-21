@extends('layouts.base')

@section('body')
    <main class="w-full h-screen flex bg-gray-100">
        <div class="h-screen w-[260px] bg-white overflow-auto">
            @can('isAdmin')
                <x-admin-aside-nav />
            @elsecan('isManager')
                <x-admin-aside-nav />
            @else
                <x-aside />
            @endcan

        </div>
        <div class="h-screen w-[calc(100vw-260px)]">
            <x-top-bar />

            <div class="h-[calc(100vh-80px)] w-full overflow-y-auto">
                @yield('content')

                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>

        </div>
    </main>
@endsection
