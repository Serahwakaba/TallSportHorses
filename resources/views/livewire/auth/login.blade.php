@section('title', 'Sign in to your account')

<section class="flex fixed inset-0 z-[99] w-screen h-screen bg-white">
    <div
        class="relative top-0 bottom-0 right-0 bg-[#303030] flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">
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
                    <h1 class="text-2xl font-semibold tracking-tight">{{ __('Login') }}</h1>
                    <p class="text-sm text-neutral-500">
                        {{ __('Enter your email below to login') }}
                    </p>
                </div>

                <form wire:submit.prevent="authenticate" class="text-start">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                            {{ __('Email address') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="email" id="email" name="email" type="email" required
                                autofocus
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

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input wire:model.lazy="remember" id="remember" type="checkbox"
                                class="form-checkbox w-4 h-4 text-primary transition duration-150 ease-in-out" />
                            <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                                {{ __('Remember') }}
                            </label>
                        </div>

                        <div class="text-sm leading-5">
                            <a href="{{ route('password.request') }}"
                                class="font-medium text-primary hover:text-secondary focus:outline-none focus:underline transition ease-in-out duration-150">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-secondary focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                {{ __('Sign in') }}
                            </button>
                        </span>
                    </div>
                </form>
                <section class="space-y-2">

                    <div class="relative py-6">
                        <div class="absolute inset-0 flex items-center">
                            <span class="w-full border-t"></span>
                        </div>
                        <div class="relative flex justify-center text-xs uppercase">
                            <span class="px-2 bg-white text-neutral-500">{{ __('Or continue with') }}</span>
                        </div>
                    </div>
                    <button
                        class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium border rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none border-input hover:bg-neutral-100"
                        type="button">
                        <img src="/images/brand-logos/google-icon.svg" alt="Google" class="w-4 h-4 mr-2" />

                        <span>{{ __('Login with Google') }}</span>
                    </button>
                </section>
            </div>
            <p class="mt-6 text-sm text-center text-neutral-500">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="relative font-medium text-primary group"><span>
                        {{ __('Sign up here') }}</span><span
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
</section>
