@section('title', 'Create a new account')

<div class="flex fixed inset-0 z-[99] w-screen h-screen bg-white">
    <div
        class="relative top-0 bottom-0 right-0 bg-secondary flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">
        <a href="https://www.sporthorses.nl" target="_blank" rel="noopener noreferrer" class="absolute top-4 left-4">
            <img src="/images/sporthorses.svg" class="h-20 w-auto" />
        </a>
        <div class="absolute inset-0 z-20 w-full h-full opacity-70 bg-gradient-to-t from-black"></div>
        <img src="/images/horse-racing.png" class="z-10 object-cover w-full h-full" />
    </div>
    <div class="relative flex flex-wrap items-center w-full h-full px-8">
        <div class="relative w-full max-w-sm mx-auto lg:mb-0">
            <div class="relative text-center">
                <div class="flex flex-col mb-6 space-y-2">
                    <h1 class="text-2xl font-semibold tracking-tight">
                        {{ __('Create an account') }}
                    </h1>
                    <p class="text-sm text-neutral-500">
                        {{ __('Enter your email below to create your account') }}
                    </p>
                </div>
                <form wire:submit.prevent="register" class="text-start">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 leading-5">
                            {{ __('Name') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="name" id="name" type="text" required autofocus
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                            {{ __('Email address') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="email" id="email" type="email" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                            {{ __('Password') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="password" id="password" type="password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 leading-5">
                            {{ __('Confirm Password') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password"
                                required
                                class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 appearance-none rounded-md focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-secondary focus:outline-none focus:border-slate-700 focus:ring-indigo active:bg-slate-700 transition duration-150 ease-in-out">
                                {{ __('Register') }}
                            </button>
                        </span>
                    </div>
                </form>

            </div>
            <p class="mt-6 text-sm text-center text-neutral-500">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="relative font-medium text-primary group">
                    <span>{{ __('Login here') }}</span>
                    <span
                        class="absolute bottom-0 left-0 w-0 group-hover:w-full ease-out duration-300 h-0.5 bg-primary"></span></a>
            </p>
            <p class="px-8 mt-1 text-sm text-center text-neutral-500">
                {{ __('By continuing, you agree to our') }}
                <a class="underline underline-offset-4 hover:text-primary" href="/terms">{{ __('Terms') }}</a>
                {{ __('and') }}
                <a class="underline underline-offset-4 hover:text-primary" href="/privacy">{{ __('Policy') }}</a>.
            </p>
        </div>
    </div>
</div>
