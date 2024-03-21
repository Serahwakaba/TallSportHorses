<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class LanguageSelector extends Component
{
    public $supported_locales = [
        ['name' => 'United Kingdom', 'lang' => 'English (UK)', 'locale' => 'en', 'country_code' => 'GB', 'link' => 'https://www.sporthorses.co.uk'],
        ['name' => 'Nederland', 'lang' => 'Dutch', 'locale' => 'nl', 'country_code' => 'NL', 'link' => 'https://www.sporthorses.nl'],
        ['name' => 'France', 'lang' => 'French', 'locale' => 'fr', 'country_code' => 'FR', 'link' => 'https://www.sporthorses.fr'],
        ['name' => 'Spain', 'lang' => 'Spanish', 'locale' => 'es', 'country_code' => 'ES', 'link' => 'https://www.sporthorses.es'],
        ['name' => 'United States', 'lang' => 'English (US)', 'locale' => 'us', 'country_code' => 'US', 'link' => 'https://www.sporthorses.us'],
        // ['name' => 'België', 'lang'=>'', 'locale' => 'be', 'country_code' => 'BE', 'link' => 'https://www.sporthorses.be'],
        ['name' => 'العربية', 'lang' => 'Arabic', 'locale' => 'ar', 'country_code' => 'AE', 'link' => 'https://www.sporthorses.ae'],
        ['name' => 'русский', 'lang' => 'Rusian', 'locale' => 'ru', 'country_code' => 'RU', 'link' => 'https://www.sporthorses.ru'],
        // ['name' => 'Schweiz', 'lang'=>'', 'locale' => 'ch', 'country_code' => 'CH', 'link' => 'https://www.sporthorses.nl'],
        ['name' => '中國', 'lang' => 'Chinese', 'locale' => 'zh', 'country_code' => 'CN', 'link' => 'https://www.sporthorses.nl'],
        // ['name' => 'Österreich', 'lang'=>'', 'locale' => 'at', 'country_code' => 'AT', 'link' => 'https://www.sporthorses.nl']
    ];

    public function setCurrentLocale($locale_string)
    {
        App::setLocale($locale_string);
        session(['langage' => $locale_string]);

        return redirect()->back()->with(['language_switched' => $locale_string]);
    }

    public function render()
    {
        return view('livewire.language-selector');
    }
}
