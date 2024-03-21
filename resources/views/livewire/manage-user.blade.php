<section class="grid gap-4 p-6 max-w-6xl mx-auto">
    <x-breadcrumbs title="{{ __('Manage User') }}" :links="[['title' => 'All Users', 'slug' => '/all-users']]" />

    <div class="w-full">
        <div class="w-full rounded-xl bg-white p-6 border-b">


            <div class="flex items-center gap-4 mb-4">
                <div>
                    <div class="w-[100px] h-[100px] rounded-full bg-gray-200">
                        <div class="flex w-full h-full items-center justify-center">
                            <x-icon-user-feather class="h-10 w-auto stroke-[0.5]" />
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="font-medium text-lg mb-1">{{ $user->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ $user->email }}</p>
                    <div class="flex gap-2 mt-2">
                        @if (isset($user->email_verified_at))
                            <span
                                class="block p-1 px-2 bg-blue-100 text-blue-600 rounded-sm text-sm">{{ __('Email Verified') }}</span>
                        @else
                            <span
                                class="block p-1 px-2 bg-orange-100 text-orange-600 rounded-sm text-sm">{{ __('Not Verified') }}</span>
                        @endif

                        @if (isset($user->subscription))
                            <span
                                class="block p-1 px-2 bg-green-100 text-green-600 rounded-sm text-sm">{{ __('Subscriber') }}</span>
                        @else
                            <span
                                class="block p-1 px-2 bg-red-100 text-red-600 rounded-sm text-sm">{{ __('Not Subscriber') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="rounded-xl border w-full grid grid-cols-3 divide-x mb-4">
                <div class="p-4">
                    <h3 class="text-sm text-gray-600 uppercase mb-2">{{ __('Created At') }}</h3>
                    <span class="text-black">{{ $user->created_at->format('M d, Y') }}</span>
                </div>
                <div class="p-4">
                    <h3 class="text-sm text-gray-600 uppercase mb-2">{{ __('Account Type') }}</h3>
                    <span class="text-black">{{ isset($user->company_name) ? 'Business' : 'User' }}</span>
                </div>
                <div class="p-4">
                    <h3 class="text-sm text-gray-600 uppercase mb-2">{{ __('Country') }}</h3>
                    <span class="text-black">{{ isset($user->country) ? $user->country : 'N/A' }}</span>
                </div>
            </div>



            <div class="flex justify-around w-full mt-6">
                <a href="tel:{{ $user->phone_country_code . $user->phone }}" class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full bg-gray-200 group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-phone class="h-6 w-auto" />
                    </div>
                    <span class="block text-base">Call</span>
                </a>

                <a href="mailto:{{ $user->email }}" class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full bg-gray-200 group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-email class="h-6 w-auto" />
                    </div>
                    <span class="block text-base">Send Email</span>
                </a>
                <button wire:click="$set('showEditOptions',{{ $showEditOptions ? 'false' : 'true' }})"
                    class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full {{ $showEditOptions ? 'bg-primary' : 'bg-gray-200' }}  group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-edit class="h-6 w-auto" />
                    </div>
                    <span class="block text-base">Edit User</span>
                </button>

            </div>
            @if ($showEditOptions)
                <div class="mt-4 border p-4 rounded-xl flex flex-wrap gap-4">
                    <x-button> Block User</x-button>
                    <x-button> Send Password Reset Email</x-button>
                    <x-button> Delete User</x-button>
                </div>
            @endif

        </div>

        <div class="w-full rounded-xl bg-white p-6 border-b mt-5">
            <h3 class="text-sm text-gray-600 uppercase mb-2 font-bold">{{ __('User Data') }}</h3>

            <div class="rounded-xl border w-full grid grid-cols-[1fr_2fr] mb-4">
                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Full Names') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->name }}</div>

                <div class="p-3 border-b  border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Email') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->email }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Phone') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->phone }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Country') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->country }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Province') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->province }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Town') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->town }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Zip Code') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->zip_code }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Street Address') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->street_address }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Company Name') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->company_name }}</div>

                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('2FA') }}</h3>
                </div>
                <div class="p-3 border-b">{{ isset($user->two_factor_confirmed_at) ? 'Yes' : 'No' }}</div>
                <div class="p-3 border-b border-r">
                    <h3 class="text-sm text-gray-600 uppercase">{{ __('Access Level') }}</h3>
                </div>
                <div class="p-3 border-b">{{ $user->role }}</div>
            </div>
        </div>

    </div>


</section>
