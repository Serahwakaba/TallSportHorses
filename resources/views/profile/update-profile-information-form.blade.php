<x-form-section id="up-profile" submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- Company Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="company_name" value="{{ __('Company Name') }}" />
            <x-input id="company_name" type="text" class="mt-1 block w-full" wire:model="state.company_name" />
            <x-input-error for="company_name" class="mt-2" />
        </div>

        <!-- Country -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="country" value="{{ __('Country') }}" />
            <select id="country" wire:model="state.country"
                class="w-full block mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Choose a country</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albanië">Albania</option>
                <option value="Algerije">Algaria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua en Barbuda">Antigua and Barbuda</option>
                <option value="Argentinië">Argentina</option>
                <option value="Armenië">Armenia</option>
                <option value="Australië">Australia</option>
                <option value="Azerbeidzjan">Azerbeidzjan</option>
                <option value="Bahama's">Bahamas</option>
                <option value="Bahrein">Bahrein</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="België">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnië en Herzegovina">Bosnia-Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazilië">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgarije">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodja">Cambodia</option>
                <option value="Canada">Canada</option>
                <option value="Centraal-Afrikaanse Republiek">Central African Republic</option>
                <option value="Chili">Chili</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoren">Comoren</option>
                <option value="Congo-Brazzaville">Congo-Brazzaville</option>
                <option value="Congo-Kinshasa">Congo-Kinshasa</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Denemarken">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominicaanse Republiek">Dominican Republic</option>
                <option value="Duitsland">Germany</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypte">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatoriaal-Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estland">Estonia</option>
                <option value="Ethiopië">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Filipijnen">Filipijnen</option>
                <option value="Finland">Finland</option>
                <option value="Frankrijk">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgië">Georgia</option>
                <option value="Ghana">Ghana</option>
                <option value="Grenada">Grenada</option>
                <option value="Griekenland">Greece</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinee">Guinee</option>
                <option value="Guinee-Bissau">Guinee-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haïti">Haïti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hongarije">Hungary</option>
                <option value="Ierland">Ireland</option>
                <option value="IJsland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesië">Indonesia</option>
                <option value="Irak">Iraq</option>
                <option value="Iran">Iran</option>
                <option value="Israël">Israel</option>
                <option value="Italië">Italy</option>
                <option value="Ivoorkust">Ivory Coast</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jemen">Jemen</option>
                <option value="Jordanië">Jordan</option>
                <option value="Kaapverdië">Cape Verde</option>
                <option value="Kameroen">Cameroon</option>
                <option value="Kazachstan">Kazakhstan</option>
                <option value="Kenia">Kenya</option>
                <option value="Kirgizië">Kirghizistan</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Koeweit">Kuwait</option>
                <option value="Kroatië">Croatia</option>
                <option value="Laos">Laos</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Letland">Latvia</option>
                <option value="Libanon">Lebanon</option>
                <option value="Liberia">Liberia</option>
                <option value="Libië">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Litouwen">Lithuania</option>
                <option value="Luxemburg">Luxembourg</option>
                <option value="Macedonië">Macedonia</option>
                <option value="Madagaskar">Madagascar</option>
                <option value="Maldiven">Maldives</option>
                <option value="Maleisië">Malaysia</option>
                <option value="Mali">Malie</option>
                <option value="Malta">Malta</option>
                <option value="Marokko">Morocco</option>
                <option value="Marshalleilanden">Marshall Islands</option>
                <option value="Mauritanië">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldavië">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolië">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibië">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nederland">the Netherlands</option>
                <option value="Nepal">Nepal</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Nieuw-Zeeland">New-Zealand</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Noord-Korea">North Korea</option>
                <option value="Noorwegen">Norway</option>
                <option value="Oeganda">Uganda</option>
                <option value="Oekraïne">Ukraine</option>
                <option value="Oezbekistan">Uzbekistan</option>
                <option value="Oman">Oman</option>
                <option value="Oost-Timor">East Timor</option>
                <option value="Oostenrijk">Austria</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestina">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papoea-Nieuw-Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Polen">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Roemenië">Romania</option>
                <option value="Rusland">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts en Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent en de Grenadines">Saint Vincent and the Grenadines</option>
                <option value="Salomonseilanden">Solomon Islands</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tomé en Principe">Sao Tome and Principe</option>
                <option value="Saoedi-Arabië">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Servië">Serbia</option>
                <option value="Seychellen">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovenië">Slovenia</option>
                <option value="Slowakije">Slovakia</option>
                <option value="Soedan">Sudan</option>
                <option value="Somalië">Somalia</option>
                <option value="Spanje">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Syrië">Syria</option>
                <option value="Tadzjikistan">Tadzjikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad en Tobago">Trinidad and Tobago</option>
                <option value="Tsjaad">Chad</option>
                <option value="Tsjechië">Czech Republic</option>
                <option value="Tunesië">Tunisia</option>
                <option value="Turkije">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vaticaanstad">Vatican</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Verenigd Koninkrijk" selected="selected">United Kingdom</option>
                <option value="Verenigde Arabische Emiraten">United Arab Emirates</option>
                <option value="Verenigde Staten">USA</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Zambia">Zambie</option>
                <option value="Zimbabwe">Zimbabwe</option>
                <option value="Zuid-Afrika">South Africa</option>
                <option value="Zuid-Korea">South Korea</option>
                <option value="Zuid-Soedan">South Sudan</option>
                <option value="Zweden">Sweden</option>
                <option value="Zwitserland">Switzerland</option>
                <option value="Anders">Other</option>
            </select>
            <x-input-error for="country" class="mt-2" />
        </div>

        <!-- Province -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="province" value="{{ __('Province') }}" />
            <x-places-autocomplete id="province" class="mt-1 block w-full" address="state.province" />
            <x-input-error for="province" class="mt-2" />
        </div>

        <!-- Street Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="street_address" value="{{ __('Street Address') }}" />
            <x-address-autocomplete id="street_address" class="mt-1 block w-full" address="state.street_address" />
            <x-input-error for="street_address" class="mt-2" />
        </div>

        <!-- Zip Code -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="zip_code" value="{{ __('Zip Code') }}" />
            <x-input id="zip_code" type="text" class="mt-1 block w-full" wire:model="state.zip_code" />
            <x-input-error for="zip_code" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
