<?php

namespace App\Http\Controllers;

use App\Models\HorseAd;
use App\Models\RealEstateAd;
use App\Models\StableAd;
use App\Models\TransportAd;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Log ad view
     * 
     * Increaments the view counter for the specifi ad by 1
     * 
     * @param string $adType The category of the ad resource. One of type: `horses, stable, transport, real-estate, banner, ponies, friesian`
     * 
     * @param string $id The unique id of the ad
     * 
     * @body {}
     * @response array{'success':true}
     */
    public function log_view(string $adType, string $id)
    {
        switch ($adType) {
            case "horses":
                return HorseAd::find($id)->increment('views');
                break;
            case "stable":
                return StableAd::find($id)->increment('views');
                break;
            case "transport":
                return TransportAd::find($id)->increment('views');
                break;
            case "real-estate":
                return RealEstateAd::find($id)->increment('views');
                break;

            default:
                return HorseAd::find($id)->increment('views');
        }
    }
}
