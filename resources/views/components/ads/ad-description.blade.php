@props([
    'placeholder' => 'Type your text',
    'addescription',
])

@php
    $countries = [
        ['name' => 'United Kingdom', 'country_code' => 'GB', 'link' => 'https://www.sporthorses.co.uk'],
        ['name' => 'Nederland', 'country_code' => 'NL', 'link' => 'https://www.sporthorses.nl'],
        ['name' => 'France', 'country_code' => 'FR', 'link' => 'https://www.sporthorses.nl'],
        ['name' => 'Spain', 'country_code' => 'ES', 'link' => 'https://www.sporthorses.nl'],
        ['name' => 'United States', 'country_code' => 'US', 'link' => 'https://www.sporthorses.us'],
        ['name' => 'België', 'country_code' => 'BE', 'link' => 'https://www.sporthorses.nl'],
        ['name' => 'العربية', 'country_code' => 'AE', 'link' => 'https://www.sporthorses.nl'],
        ['name' => 'русский', 'country_code' => 'RU', 'link' => 'https://www.sporthorses.nl'],
        ['name' => 'Schweiz', 'country_code' => 'CH', 'link' => 'https://www.sporthorses.nl'],
        ['name' => '中國', 'country_code' => 'CN', 'link' => 'https://www.sporthorses.nl'],
        ['name' => 'Österreich', 'country_code' => 'AT', 'link' => 'https://www.sporthorses.nl'],
    ];

    $language_options = ['English', 'Dutch', 'German', 'French', 'Arabic', 'Russian', 'Chinese'];
@endphp

<div x-data="{
    description: @entangle($addescription),
    activeLanguage: 'English'
}" x-init="if (!description) {
    description = {
        english: '',
        dutch: '',
        german: '',
        french: '',
        arabic: '',
        russian: '',
        chinese: '',
    }
}" class="w-full mt-1">
    <x-select class="mb-2" x-model="activeLanguage" :options="$language_options" placeholder="Choose language" />
    <textarea x-data="{
        resize() {
                $el.style.height = '0px';
                $el.style.height = $el.scrollHeight + 'px'
            },
    
    }" x-init="resize()" @input="resize()" type="text"
        x-model="description[activeLanguage.toLowerCase()]" placeholder="{{ $placeholder }}"
        class="flex w-full h-auto min-h-[160px] px-3 py-2 bg-white border rounded-md border-neutral-300 placeholder:text-neutral-400 focus:border-neutral-300 disabled:cursor-not-allowed disabled:opacity-50"></textarea>
</div>
