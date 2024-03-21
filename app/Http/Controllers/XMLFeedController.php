<?php

namespace App\Http\Controllers;

use App\Models\HorseAd;
use Illuminate\Http\Request;

class XMLFeedController extends Controller
{
    public function index()
    {
        $ads = HorseAd::latest()->get();

        return response()->view('xml-feed', [
            'ads' => $ads
        ])->header('Content-Type', 'text/xml');
    }
}
