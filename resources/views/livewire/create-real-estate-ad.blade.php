@php
    $categoryOptions = [
        'House',
        'Property',
        'Riding School',
        'Livery yard',
        'Stable',
        'Villa',
        'Clinic',
        'Trading stable',
    ];

    $boleanOptions = ['Yes', 'No'];

    $countriesOptions = [
        'Netherlands',
        'Belgium',
        'Germany',
        'Afghanistan',
        'Albania',
        'Algeria',
        'American Samoa',
        'Andorra',
        'Angola',
        'Anguilla',
        'Antarctica',
        'Antigua and Barbuda',
        'Argentina',
        'Armenia',
        'Aruba',
        'Australia',
        'Austria',
        'Azerbaijan',
        'Bahamas',
        'Bahrain',
        'Bangladesh',
        'Barbados',
        'Belarus',

        'Belize',
        'Benin',
        'Bermuda',
        'Bhutan',
        'Bolivia',
        'Bosnia and Herzegowina',
        'Botswana',
        'Bouvet Island',
        'Brazil',
        'British Indian Ocean Territory',
        'Brunei Darussalam',
        'Bulgaria',
        'Burkina Faso',
        'Burundi',
        'Cambodia',
        'Cameroon',
        'Canada',
        'Cape Verde',
        'Cayman Islands',
        'Central African Republic',
        'Chad',
        'Chile',
        'China',
        'Christmas Island',
        'Cocos (Keeling) Islands',
        'Colombia',
        'Comoros',
        'Congo',
        'Congo, the Democratic Republic of the',
        'Cook Islands',
        'Costa Rica',
        "Cote d'Ivoire",
        'Croatia (Hrvatska)',
        'Cuba',
        'Cyprus',
        'Czech Republic',
        'Denmark',
        'Djibouti',
        'Dominica',
        'Dominican Republic',
        'East Timor',
        'Ecuador',
        'Egypt',
        'El Salvador',
        'Equatorial Guinea',
        'Eritrea',
        'Estonia',
        'Ethiopia',
        'Falkland Islands (Malvinas)',
        'Faroe Islands',
        'Fiji',
        'Finland',
        'France',
        'France Metropolitan',
        'French Guiana',
        'French Polynesia',
        'French Southern Territories',
        'Gabon',
        'Gambia',
        'Georgia',

        'Ghana',
        'Gibraltar',
        'Greece',
        'Greenland',
        'Grenada',
        'Guadeloupe',
        'Guam',
        'Guatemala',
        'Guinea',
        'Guinea-Bissau',
        'Guyana',
        'Haiti',
        'Heard and Mc Donald Islands',
        'Holy See (Vatican City State)',
        'Honduras',
        'Hong Kong',
        'Hungary',
        'Iceland',
        'India',
        'Indonesia',
        'Iran (Islamic Republic of)',
        'Iraq',
        'Ireland',
        'Israel',
        'Italy',
        'Jamaica',
        'Japan',
        'Jordan',
        'Kazakhstan',
        'Kenya',
        'Kiribati',
        "Korea, Democratic People's Republic of",
        'Korea, Republic of',
        'Kuwait',
        'Kyrgyzstan',
        "Lao, People's Democratic Republic",
        'Latvia',
        'Lebanon',
        'Lesotho',
        'Liberia',
        'Libyan Arab Jamahiriya',
        'Liechtenstein',
        'Lithuania',
        'Luxembourg',
        'Macau',
        'Macedonia, The Former Yugoslav Republic of',
        'Madagascar',
        'Malawi',
        'Malaysia',
        'Maldives',
        'Mali',
        'Malta',
        'Marshall Islands',
        'Martinique',
        'Mauritania',
        'Mauritius',
        'Mayotte',
        'Mexico',
        'Micronesia, Federated States of',
        'Moldova, Republic of',
        'Monaco',
        'Mongolia',
        'Montserrat',
        'Morocco',
        'Mozambique',
        'Myanmar',
        'Namibia',
        'Nauru',
        'Nepal',

        'Netherlands Antilles',
        'New Caledonia',
        'New Zealand',
        'Nicaragua',
        'Niger',
        'Nigeria',
        'Niue',
        'Norfolk Island',
        'Northern Mariana Islands',
        'Norway',
        'Oman',
        'Pakistan',
        'Palau',
        'Panama',
        'Papua New Guinea',
        'Paraguay',
        'Peru',
        'Philippines',
        'Pitcairn',
        'Poland',
        'Portugal',
        'Puerto Rico',
        'Qatar',
        'Reunion',
        'Romania',
        'Russian Federation',
        'Rwanda',
        'Saint Kitts and Nevis',
        'Saint Lucia',
        'Saint Vincent and the Grenadines',
        'Samoa',
        'San Marino',
        'Sao Tome and Principe',
        'Saudi Arabia',
        'Senegal',
        'Seychelles',
        'Sierra Leone',
        'Singapore',
        'Slovakia (Slovak Republic)',
        'Slovenia',
        'Solomon Islands',
        'Somalia',
        'South Africa',
        'South Georgia and the South Sandwich Islands',
        'Spain',
        'Sri Lanka',
        'St. Helena',
        'St. Pierre and Miquelon',
        'Sudan',
        'Suriname',
        'Svalbard and Jan Mayen Islands',
        'Swaziland',
        'Sweden',
        'Switzerland',
        'Syrian Arab Republic',
        'Taiwan, Province of China',
        'Tajikistan',
        'Tanzania, United Republic of',
        'Thailand',
        'Togo',
        'Tokelau',
        'Tonga',
        'Trinidad and Tobago',
        'Tunisia',
        'Turkey',
        'Turkmenistan',
        'Turks and Caicos Islands',
        'Tuvalu',
        'Uganda',
        'Ukraine',
        'United Arab Emirates',
        'United Kingdom',
        'United States',
        'United States Minor Outlying Islands',
        'Uruguay',
        'Uzbekistan',
        'Vanuatu',
        'Venezuela',
        'Vietnam',
        'Virgin Islands (British)',
        'Virgin Islands (U.S.)',
        'Wallis and Futuna Islands',
        'Western Sahara',
        'Yemen',
        'Yugoslavia',
        'Zambia',
        'Zimbabwe',
    ];

    $yearOptions = range(2024, 1980);

    $sizeOptions = [
        ['title' => '0ha to 1ha', 'value' => 1],
        ['title' => '1ha to 2ha', 'value' => 2],
        ['title' => '2ha to 5ha', 'value' => 5],
        ['title' => '5ha to 10ha', 'value' => 10],
        ['title' => '10ha to 20ha', 'value' => 20],
        ['title' => '20ha to 50ha', 'value' => 50],
        ['title' => '50ha to 100ha', 'value' => 100],
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
                        <x-label for="title" value="{{ __('Name') }}" />
                        <x-input id="title" type="text" class="mt-1 block w-full" wire:model="form.title"
                            required autocomplete="title" />
                        <x-input-error for="form.title" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="col-span-6">
                        <x-label for="category" value="{{ __('Category') }}" />
                        <x-select id="category" class="mt-1 block w-full" wire:model="form.category"
                            :options="$categoryOptions" />
                        <x-input-error for="form.category" class="mt-2" />
                    </div>

                    <!-- Country -->
                    <div class="col-span-6">
                        <x-label for="country" value="{{ __('Country') }}" />
                        <x-select id="country" class="mt-1 block w-full" wire:model="form.country"
                            :options="$countriesOptions" />
                        <x-input-error for="form.country" class="mt-2" />
                    </div>

                    <!-- Province -->
                    <div class="col-span-6">
                        <x-label for="province" value="{{ __('Province') }}" />
                        <x-input id="province" type="text" class="mt-1 block w-full" wire:model="form.province" />
                        <x-input-error for="form.province" class="mt-2" />
                    </div>

                    <!-- Address -->
                    <div class="col-span-6">
                        <x-label for="address" value="{{ __('Address') }}" />
                        <x-input id="address" type="text" class="mt-1 block w-full" wire:model="form.address"
                            autocomplete="address" />
                        <x-input-error for="form.address" class="mt-2" />
                    </div>

                    <!-- Zip Code -->
                    <div class="col-span-6">
                        <x-label for="zip_code" value="{{ __('Zip Code') }}" />
                        <x-input id="zip_code" type="text" class="mt-1 block w-full" wire:model="form.zip_code"
                            autocomplete="zip_code" />
                        <x-input-error for="form.zip_code" class="mt-2" />
                    </div>

                    <!-- Year of Construction -->
                    <div class="col-span-6">
                        <x-label for="year_of_construction" value="{{ __('Year of Construction') }}" />
                        <x-select id="year_of_construction" class="mt-1 block w-full"
                            wire:model="form.year_of_construction" :options="$yearOptions" />
                        <x-input-error for="form.year_of_construction" class="mt-2" />
                    </div>

                    <!-- Size -->
                    <div class="col-span-6">
                        <x-label for="size" value="{{ __('Area Size') }}" />

                        <select wire:model="form.size"
                            class='mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'>
                            <option value="">{{ __('Choose Area Size') }}</option>
                            @foreach ($sizeOptions as $option)
                                <option value="{{ $option['value'] }}">{{ $option['title'] }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="form.size" class="mt-2" />
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


                    <!-- Amenities -->
                    <div class="col-span-6">
                        <x-label for="amenities" value="{{ __('Extra Facilities') }}" />
                        <x-input id="amenities" type="text" class="mt-1 block w-full" wire:model="form.amenities"
                            autocomplete="amenities" />
                        <x-input-error for="form.amenities" class="mt-2" />
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
                <x-icon-realestate class="h-10 w-auto mb-4" />
                <h1 class="text-xl font-bold mb-2">{{ __('Equestrian real estate') }}</h1>
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
