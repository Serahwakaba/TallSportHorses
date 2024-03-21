<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function languageSwitch(Request $request)
    {
        $language = $request->input('language');

        $request->session()->put('language', $language);

        return redirect()->back()->with(['language_switched' => $language]);
    }
}
