@php
    $categoryOptions = ['Trailer', 'Truck', 'Pony Trailer'];

    $colorOptions = [
        'Blue',
        'Brown',
        'Yellow',
        'Grey',
        'Green',
        'Orange',
        'Purple',
        'Red',
        'Pink',
        'White',
        'Black',
        'Other',
    ];

    $boleanOptions = ['Yes', 'No'];

    $materialOptions = ['Aluminium', 'Wood', 'Steel', 'Polyester', 'Other'];

    $licenseOptions = ['Preliminary', 'BE', 'C', 'CE'];

    $capacityOptions = [1, 1.5, 2, 3, 4, 5, 6, 7, 8];

    $brandOptions = [
        'Alutrailer',
        'Atec',
        'Barthau',
        'Bateson',
        'Bison',
        'Blomert',
        'BMW',
        'Böckmann',
        'Bohemia',
        'Brenderup',
        'Cheval Liberté',
        'Chevy',
        'Chrysler',
        'Circle J',
        'DAF',
        'Dodge',
        'Equitrek',
        'Exiss',
        'Featherlite',
        'Fiat',
        'Ford',
        'Gore',
        'Hahn',
        'Heja',
        'Hibra',
        '
Hotra',
        '
Humbaur',
        'Hyundai',
        'Ifor Williams',
        'Iveco',
        'Jeep',
        'Kia',
        '
Landrover',
        'MAN',
        'Mercedes',
        'Mitsubishi',
        'Mustang',
        '
new lock',
        'Nissan',
        'Opel',
        'Peugeot',
        'Range Rover',
        'Renault',
        'Saris',
        'Scania',
        'Shadow',
        'Sooner',
        'SsangYong',
        'Stema',
        'Toyota',
        'VolksWagen',
        'Volvo',
        'Weijer',
        'Wesco',
        'Westfalia',
        'WM Meyer',
    ];

@endphp

<form x-data="{ activeTab: 'EDITOR' }" id="ad-details" wire:submit="save"
    class="grid md:grid-cols-[1fr_240px] gap-6 p-4 md:p-8 max-w-6xl mx-auto">

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

                    <!-- Transport Type -->
                    <div class="col-span-6">
                        <x-label for="category" value="{{ __('Category') }}" />
                        <x-select id="category" class="mt-1 block w-full" wire:model="form.category"
                            :options="$categoryOptions" />
                        <x-input-error for="form.category" class="mt-2" />
                    </div>

                    <!-- Brand -->
                    <div class="col-span-6">
                        <x-label for="brand" value="{{ __('Brand') }}" />
                        <x-select id="brand" class="mt-1 block w-full" wire:model="form.brand" :options="$brandOptions" />

                        <x-input-error for="form.brand" class="mt-2" />
                    </div>

                    <!-- Year of Manufacture -->
                    <div class="col-span-6">
                        <x-label for="yom" value="{{ __('Year of Manufacture') }}" />
                        <x-input id="yom" type="number" class="mt-1 block w-full" wire:model="form.yom"
                            autocomplete="yom" />

                        <x-input-error for="form.price" class="mt-2" />
                    </div>

                    <!-- Capacity -->
                    <div class="col-span-6">
                        <x-label for="carry_capacity" value="{{ __('Number of Horses') }}" />
                        <x-select id="carry_capacity" class="mt-1 block w-full" wire:model="form.carry_capacity"
                            :options="$capacityOptions" placeholder="{{ __('Not Applicable') }}" />
                        <x-input-error for="form.carry_capacity" class="mt-2" />
                    </div>

                    <!-- Color -->
                    <div class="col-span-6">
                        <x-label for="color" value="{{ __('Color') }}" />
                        <x-select id="color" class="mt-1 block w-full" wire:model="form.color" :options="$colorOptions" />
                        <x-input-error for="form.color" class="mt-2" />
                    </div>

                    <!-- Material -->
                    <div class="col-span-6">
                        <x-label for="material" value="{{ __('Material') }}" />
                        <x-select id="material" class="mt-1 block w-full" wire:model="form.material"
                            :options="$materialOptions" />
                        <x-input-error for="form.material" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div class="col-span-6">
                        <x-label for="price" value="{{ __('Price') }}" />
                        <x-input id="price" type="number" disabled="{{ $form->poa }}" class="mt-1 block w-full"
                            wire:model="form.price" autocomplete="price" />
                        <div class="flex items-center gap-2 mt-2">
                            <x-checkbox name='poa' wire:model.live='form.poa' />
                            <span class="text-sm">{{ __('Price on request') }}</span>
                        </div>
                        <x-input-error for="form.price" class="mt-2" />
                    </div>

                    <!-- Driving License -->
                    <div class="col-span-6">
                        <x-label for="driving_license" value="{{ __('Driving License') }}" />
                        <x-select id="driving_license" class="mt-1 block w-full" wire:model="form.driving_license"
                            :options="$licenseOptions" />
                        <x-input-error for="form.driving_license" class="mt-2" />
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
                <x-icon-transport class="h-10 w-auto mb-4" />
                <h1 class="text-xl font-bold mb-2">{{ __('Transport Ad') }}</h1>
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
