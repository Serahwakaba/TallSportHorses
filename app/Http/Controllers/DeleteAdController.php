<?php

namespace App\Http\Controllers;

use App\Models\BannerAd;
use App\Models\HorseAd;
use App\Models\StableAd;
use App\Models\TransportAd;
use App\Models\RealEstateAd;
use Illuminate\Http\Request;

class DeleteAdController extends Controller
{

    public function handleDelete(Request $request)
    {
        $ad_type = $request->input('ad-type');
        $id = $request->input('ad-id');

        // TODO: check if user can delete: users should only delete their own ads
        switch ($ad_type) {
            case "horses":
                HorseAd::find($id)->delete();
                return redirect()->back()->with(['ad_deleted' => true]);
                break;
            case "ponies":
                HorseAd::find($id)->delete();
                return redirect()->back()->with(['ad_deleted' => true]);
                break;
            case "stable":
                StableAd::find($id)->delete();
                return redirect()->back()->with(['ad_deleted' => true]);
                break;
            case "transport":
                TransportAd::find($id)->delete();
                return redirect()->back()->with(['ad_deleted' => true]);
                break;
            case "real-estate":
                RealEstateAd::find($id)->delete();
                return redirect()->back()->with(['ad_deleted' => true]);
                break;
            case "banner":
                BannerAd::find($id)->delete();
                return redirect()->back()->with(['ad_deleted' => true]);
                break;
            default:
                return;
        }

        return redirect()->back()->with(['ad_deleted' => true]);
    }
}
