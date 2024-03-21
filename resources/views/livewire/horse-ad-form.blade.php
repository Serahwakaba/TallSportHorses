@php
    $horseTypes = [
        'Dressage horse',
        'Endurance horse',
        'Show jumping horse',
        'Recreation horse',
        'Hunter',
        'Horse',
        'Broodmare',
        'Western horse',
        'Driving horse',
        'Eventing horse',
        'Hunting horse',
        'Stud',
        'Allrounder',
        'Allround horse',
    ];

    $ageOptions = range(1, 30);

    $levelOptions = [
        'Preliminary',
        'Novice',
        'Elementary',
        'Medium',
        'Advanced Medium',
        'National',
        'International',
        'Broken',
        'Unbroken',
        '1.00m',
        '1.10m',
        '1.20m',
        '1.30m',
        '1.40m',
    ];

    $genderOptions = ['Mare', 'Gelding', 'Stallion'];

    $studbookOptions = [
        'KWPN',
        'NRPS',
        'BWP',
        'SBS',
        'Holstein',
        'Oldenburg',
        'Westphalia',
        'Trakehnen',
        'Irish Sport Horse',
        'Canadian warmblood',
        'Selle Americain',
        'Arab',
        'Quarter Horse',
        'Selle Français',
        'Hanover',
        'American Saddlebred',
        'Skewbald horse',
        'Swedish Warmblood',
        'Thoroughbred',
        'Zangersheide',
        'Warmblood',
        'Friesian',
        'PRE',
        'onbekend (Groninger stamboek )',
        'Danish warmblood',
        'Lipizzaner',
        'Other Studbook',
    ];

    $colorOptions = ['Brown', 'Chestnut', 'Black', 'Grey', 'Dark brown', 'Skewbald', 'Palomino', 'Roan brown', 'Other'];

    $boleanOptions = ['Yes', 'No'];

@endphp

<form id="ad-details" wire:submit="save" class="grid md:grid-cols-[1fr_240px] gap-6 p-4 md:p-8 max-w-6xl mx-auto">

    @if ($activeTab === 'MANAGE')
        <x-ads.ad-manage :data="$data" />
    @endif

    @if ($activeTab === 'EDITOR')
        <div class="w-full mb-16">
            <section class="bg-white rounded-xl border">
                <div class="bg-white border-b p-6 rounded-t-xl flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900"> {{ __('Ad Details') }}</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ad Details and pricing') }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-6 gap-6 p-6">

                    <!-- Title -->
                    <div class="col-span-6">
                        <x-label for="title" value="{{ __('Title') }}" />
                        <x-input id="title" type="text" class="mt-1 block w-full" wire:model="form.title"
                            required autocomplete="title" />
                        <x-input-error for="form.title" class="mt-2" />
                    </div>

                    <!-- Horse Type -->
                    <div class="col-span-6">
                        <x-label for="category" value="{{ __('Category') }}" />
                        <x-select id="category" class="mt-1 block w-full" wire:model="form.category"
                            :options="$horseTypes" />
                        <x-input-error for="form.category" class="mt-2" />
                    </div>

                    <!-- Predicate -->
                    <div class="col-span-6">
                        <x-label for="predicate" value="{{ __('Predicate') }}" />
                        <x-input id="predicate" type="text" class="mt-1 block w-full" wire:model="form.predicate"
                            autocomplete="predicate" />
                        <x-input-error for="form.predicate" class="mt-2" />
                    </div>

                    <!-- Tribe -->
                    <div class="col-span-6">
                        <x-label for="tribe" value="{{ __('Tribe') }}" />
                        <x-input id="tribe" type="text" class="mt-1 block w-full" wire:model="form.tribe"
                            autocomplete="tribe" />
                        <x-input-error for="form.tribe" class="mt-2" />
                    </div>

                    <!-- Age -->
                    <div class="col-span-6">
                        <x-label for="age" value="{{ __('Age') }}" />
                        <x-select id="age" class="mt-1 block w-full" wire:model="form.age" :options="$ageOptions" />
                        <x-input-error for="form.age" class="mt-2" />
                    </div>

                    <!-- Level -->
                    <div class="col-span-6">
                        <x-label for="level" value="{{ __('Level') }}" />
                        <x-select id="level" class="mt-1 block w-full" wire:model="form.level" :options="$levelOptions" />
                        <x-input-error for="form.level" class="mt-2" />
                    </div>

                    <!-- Gender -->
                    <div class="col-span-6">
                        <x-label for="gender" value="{{ __('Gender') }}" />
                        <x-select id="gender" class="mt-1 block w-full" wire:model="form.gender" :options="$genderOptions" />
                        <x-input-error for="form.gender" class="mt-2" />
                    </div>

                    <!-- Studbook -->
                    <div class="col-span-6">
                        <x-label for="studbook" value="{{ __('Studbook') }}" />
                        <x-select id="studbook" class="mt-1 block w-full" wire:model="form.studbook"
                            :options="$studbookOptions" />
                        <x-input-error for="form.studbook" class="mt-2" />
                    </div>

                    <!-- Color -->
                    <div class="col-span-6">
                        <x-label for="color" value="{{ __('Color') }}" />
                        <x-select id="color" class="mt-1 block w-full" wire:model="form.color" :options="$colorOptions" />
                        <x-input-error for="form.color" class="mt-2" />
                    </div>

                    <!-- Height of Wiskers -->
                    <div class="col-span-6">
                        <x-label for="withers_length" value="{{ __('Height of withers (CM)') }}" />
                        <x-input id="withers_length" type="number" class="mt-1 block w-full"
                            wire:model="form.withers_length" autocomplete="withers_length" />
                        <div class="flex items-center gap-2 mt-2">
                            <x-checkbox name='withers_not_applicable' />
                            <span class="text-sm">Not applicable</span>
                        </div>
                        <x-input-error for="form.withers_length" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div class="col-span-6">
                        <x-label for="price" value="{{ __('Price') }}" />
                        <x-input id="price" type="number" disabled="{{ $form->poa }}"
                            class="mt-1 block w-full" wire:model="form.price" autocomplete="price" />
                        <div class="flex items-center gap-2 mt-2">
                            <x-checkbox name='poa' wire:model.live='form.poa' />
                            <span class="text-sm">{{ __('Price on request') }}</span>
                        </div>
                        <x-input-error for="form.price" class="mt-2" />
                    </div>

                    <!-- X-Ray -->
                    <div x-data="{ showDatePicker: false }" class="col-span-6">
                        <x-label for="xray_approved" value="{{ __('X-Ray Approved') }}" />
                        <x-select id="xray_approved" class="mt-1 block w-full" wire:model="form.xray_approved"
                            :options="$boleanOptions" placeholder="Not applicable" />
                        <x-input-error for="form.xray_approved" class="mt-2" />
                        <div class="mt-2">
                            <button x-on:click="showDatePicker = !showDatePicker" type="button"
                                class="font-medium text-primary p-1 flex items-center gap-2 text-sm">
                                <x-icon-plus class="h-4 w-auto" />
                                <span>{{ __('Approved At') }}</span>
                            </button>
                            <div x-show="showDatePicker" class="mt-2">
                                <x-input type="date" wire:model="form.xray_approved_date" />
                            </div>
                        </div>
                    </div>

                    <!-- Clinical proven  -->
                    <div x-data="{ showDatePicker: false }" class="col-span-6">
                        <x-label for="clinical_proven" value="{{ __('Clinical Proven ') }}" />
                        <x-select id="clinical_proven" class="mt-1 block w-full" wire:model="form.clinical_proven"
                            :options="$boleanOptions" placeholder="Not applicable" />
                        <x-input-error for="form.clinical_proven" class="mt-2" />
                        <div class="mt-2">
                            <button x-on:click="showDatePicker = !showDatePicker" type="button"
                                class="font-medium text-primary p-1 flex items-center gap-2 text-sm">
                                <x-icon-plus class="h-4 w-auto" />
                                <span>{{ __('Approved At') }}</span>
                            </button>
                            <div x-show="showDatePicker" class="mt-2">
                                <x-input type="date" wire:model="form.clinical_proven_date" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white rounded-xl border mt-6">
                <div class="bg-white border-b p-6 rounded-t-xl flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900"> {{ __('Description') }}</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Write your ad's Description") }}
                        </p>
                    </div>
                </div>

                <!-- Description  -->
                <div class="p-6">
                    <div class="col-span-6">
                        <x-label for="descripiton" value="{{ __('Description ') }}" />
                        <x-ads.ad-description addescription="form.description" />
                        <x-input-error for="form.descripiton" class="mt-2" />

                    </div>
                </div>
            </section>

            <section class="bg-white rounded-xl border mt-6">
                <div class="bg-white border-b p-6 rounded-t-xl flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900"> {{ __('Pedigree') }}</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Fill in the horse's pedigree") }}
                        </p>
                    </div>
                </div>

                <!-- Pedigree  -->
                <div class="p-6">
                    <div class="col-span-6">
                        <x-ads.ad-family-tree familyTree="form.family_tree" />
                        <x-input-error for="form.family_tree" class="mt-2" />

                    </div>
                </div>
            </section>

            <section class="bg-white rounded-xl border mt-6">
                <div class="bg-white border-b p-6 rounded-t-xl flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900"> {{ __('Media') }}</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Add photos and videos for your ad.') }}
                        </p>
                    </div>
                </div>

                <!-- Media  -->
                <div class="p-6">
                    <!-- Images -->
                    <div class="col-span-6">
                        <x-label for="images" value="{{ __('Images') }}" />
                        <x-ads.ad-image-uploader images="form.images" />
                    </div>

                    <!-- Video -->
                    <div class="col-span-6">
                        <x-label for="video_link" value="{{ __('Youtube') }}" />
                        <x-ads.ad-youtube videoLinks="form.video_link" />
                        <x-input-error for="form.video_link" class="mt-2" />
                    </div>
                </div>
            </section>

            <section class="bg-white rounded-xl border mt-6">
                <div class="bg-white border-b p-6 rounded-t-xl flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900"> {{ __('Performance list') }}</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Fill in the horse's performance history") }}
                        </p>
                    </div>
                </div>

                <!-- Performance list  -->
                <div class="p-6">
                    <div class="col-span-6">
                        <x-ads.ad-perfomance performance="form.achievements" />
                    </div>
                </div>
            </section>

        </div>
    @endif

    {{-- PUBLISH --}}
    @if ($activeTab === 'PUBLISH')
        <section>
            <div class="p-4 bg-white rounded-xl border">
                <button type="button" wire:click="$set('activeTab', 'EDITOR')"
                    class="flex items-center gap-2 text-center rounded-full text-sm font-medium uppercase px-4 py-2.5 tracking-wider bg-gray-200 text-black mb-5">
                    <x-icon-chevron-left class="h-5 w-auto" />
                    {{ __('Back to Editor') }}
                </button>
                <h2 class="text-2xl font-bold mb-6">{{ __('Publish') }}</h2>
                <x-ads.ad-promotion-options publishAddons="form.publish_addons"
                    selectedPackage="form.publish_package" />
            </div>
        </section>
    @endif

    <aside class="w-full">
        <div class="w-full bg-white sticky top-[100px] z-40 rounded-xl">
            <div class="p-4">
                <x-icon-horse class="h-10 w-auto mb-4" />
                <h1 class="text-xl font-bold mb-2">{{ __('Horse Ad') }}</h1>
                <a href="{{ route('profile') }}"
                    class="flex w-full rounded p-2 items-center gap-2 hover:bg-gray-200 border">
                    <x-icon-globe class="w-6 h-6" />
                    <span>{{ Auth::user()->country }}</span>
                </a>
            </div>

            @if ($activeTab === 'EDITOR')
                <div class="p-4">
                    <x-action-message class="me-3" on="saved">
                        {{ __('Saved.') }}
                    </x-action-message>

                    <button
                        class="w-full text-center rounded-full bg-secondary text-white text-sm font-medium uppercase py-2.5 tracking-wider disabled:cursor-not-allowed"
                        wire:loading.attr="disabled" type='submit'>
                        {{ __('Save') }}
                    </button>

                    @if (isset($data) && $data->published)
                        <button type="button" wire:click="$set('activeTab', 'MANAGE')"
                            class="w-full text-center rounded-full bg-green-600 text-white text-sm font-medium uppercase py-2.5 tracking-wider disabled:cursor-not-allowed disabled:bg-gray-200 disabled:text-black mt-3">
                            {{ __('Manage') }}
                        </button>
                    @else
                        <button {{ $editMode ? '' : 'disabled' }} type="button"
                            wire:click="$set('activeTab', 'PUBLISH')"
                            class="w-full text-center rounded-full bg-green-600 text-white text-sm font-medium uppercase py-2.5 tracking-wider disabled:cursor-not-allowed disabled:bg-gray-200 disabled:text-gray-400 mt-3">
                            {{ __('Publish') }}
                        </button>
                    @endif
                </div>
            @endif

            @if ($activeTab === 'PUBLISH' || $activeTab === 'MANAGE')
                <div class="p-4">
                    <button type="button" wire:click="$set('activeTab', 'EDITOR')"
                        class="flex items-center gap-2 text-center rounded-full text-sm font-medium uppercase px-4 py-2.5 tracking-wider bg-gray-200 text-black mb-5">
                        <x-icon-chevron-left class="h-5 w-auto" />
                        {{ __('Back to Editor') }}
                    </button>
                </div>
            @endif
        </div>
    </aside>
</form>
