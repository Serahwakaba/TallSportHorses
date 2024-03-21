@section('title', 'Reset password')

<div class="w-full min-h-screen grid sm:grid-cols-2">
    <a href="{{ route('login') }}" class="fixed z-10 top-6 left-6 flex gap-2 items-center hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>
        <span>{{ __('Back') }}</span>
    </a>
    <section class="min-h-screen w-full flex items-center">
        <div class="mt-8 mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 mb-2 text-2xl font-extrabold text-center text-gray-900 leading-9">
                {{ __('Forgot password?') }}
            </h2>
            <p class="text-center text-gray-600">{{ __('Enter your email to reset your password.') }}</p>
            <div class="px-4 py-8">
                @if ($emailSentMessage)
                    <div class="rounded-md bg-green-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium text-green-800">
                                    {{ $emailSentMessage }}
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <form wire:submit.prevent="sendResetPasswordLink">
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
                            <span class="block w-full rounded-md shadow-sm">
                                <button type="submit"
                                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-secondary focus:outline-none focus:border-secondary focus:ring-indigo transition duration-150 ease-in-out">
                                    {{ __('Send password reset link') }}
                                </button>
                            </span>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </section>
    <section class="w-full h-screen relative bg-secondary">
        <a href="{{ route('home') }}" class="absolute top-6 left-[50%]">
            <x-logo class="w-auto h-16 md:h-20 mx-auto text-indigo-600" />
        </a>
        <img src="/images/karin-zabret-W7vc1_6dQZE-unsplash.jpg" class="z-10 object-cover w-full h-full" />
    </section>
</div>
