@extends('layouts.base')

@section('body')
    @can('isAdmin')
        <main class="w-full h-screen flex bg-gray-100">
            <div class="h-screen w-[260px] bg-white overflow-auto">
                <x-admin-aside-nav />
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
    @elsecan('isManager')
        <main class="w-full h-screen flex bg-gray-100">
            <div class="h-screen w-[260px] bg-white overflow-auto">
                <x-admin-aside-nav />
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
    @else
        <main class="w-full h-screen flex bg-gray-100 items-center justify-center">
            <div class="text-center">
                <x-icon-exclamation class="h-16 w-auto mb-3 inline-block" />
                <h1 class="text-3xl mb-4">{{ __('Not Authorized') }}</h1>
                <a href="/" class="inline-block text-center px-4 rounded-full py-2 bg-gray-300 text-sm tracking-wider">
                    {{ __('GO HOME') }}</a>
            </div>
        </main>
    @endcan
@endsection
