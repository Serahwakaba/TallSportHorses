<?php

namespace App\Http\Controllers;

use App\Models\StableAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StableAdsController extends Controller
{
    /**
     * Display all ads.
     * 
     * @response array{data: array{StableAd},"current_page": 1,"next_page_url": null,"total": 4}
     * @unauthenticated
     */
    public function index()
    {
        return StableAd::all();
    }

    /**
     * Create Stable ad.
     * 
     * @response array{status:'success',data: StableAd}
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'int',
            'poa' => 'bool',
            'business_type' => 'string',
            'images' => 'array',
            'video_link' => 'array',

        ]);

        $user_id = $request->user()['id'];
        $data_to_save = $request->all();
        $data_to_save['user_id'] = $user_id;

        return StableAd::create($data_to_save);
    }

    /**
     * Find ad by id
     * 
     * @param string $id unique id of the ad
     * 
     * @response StableAd
     * @unauthenticated
     */
    public function show(string $id)
    {
        return StableAd::find($id);
    }

    /**
     * Update ad
     * 
     * @param string $id The unique id of the ad resource
     * 
     * @response array{'status':'success', data: StableAd}
     */
    public function update(Request $request, string $id)
    {
        $ad = StableAd::find($id);
        $ad->update($request->all());

        return $ad;
    }

    /**
     * Delete Ad
     * 
     * @param string $id The unique id of the ad resource
     * 
     * @response array{'status':'success', message: 'Deleted'}
     */
    public function destroy(string $id)
    {
        return StableAd::destroy($id);
    }

    /**
     * Search
     * 
     * Search for a specific ad by a query string.
     * 
     * @response array{data: array{StableAd}}
     * @unauthenticated
     */
    public function search(Request $request)
    {
        Validator::make($request->all(), [
            // This is a search string to filter ads by.
            'search' => 'string',

        ]);

        $search = $request->query('search');

        return StableAd::where('title', 'like', '%' . $search . '%')->get();
    }
}
