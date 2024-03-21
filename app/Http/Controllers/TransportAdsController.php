<?php

namespace App\Http\Controllers;

use App\Models\TransportAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransportAdsController extends Controller
{
    /**
     * Display all ads.
     * 
     * @response array{data: array{TransportAd},"current_page": 1,"next_page_url": null,"total": 4}
     * @unauthenticated
     */
    public function index()
    {
        return TransportAd::all();
    }

    /**
     * Create Transport ad.
     * 
     * @response array{status:'success',data: TransportAd}
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'int',
            'poa' => 'bool',
            'images' => 'array',
            'video_link' => 'array',
            'brand' => 'string',
            'carry_capacity' => 'string',
            'yom' => 'string',
            'color' => 'string',
            'material' => 'string',
            'driving_license' => 'string',
        ]);

        $user_id = $request->user()['id'];
        $data_to_save = $request->all();
        $data_to_save['user_id'] = $user_id;

        return TransportAd::create($data_to_save);
    }

    /**
     * Find ad by id
     * 
     * @param string $id unique id of the ad
     * 
     * @response TransportAd
     * @unauthenticated
     */
    public function show(string $id)
    {
        return TransportAd::find($id);
    }

    /**
     * Update ad
     * 
     * @param string $id The unique id of the ad resource
     * 
     * @response array{'status':'success', data: TransportAd}
     */
    public function update(Request $request, string $id)
    {
        $ad = TransportAd::find($id);
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
        return TransportAd::destroy($id);
    }

    /**
     * Search
     * 
     * Search for a specific ad by a query string.
     * 
     * @response array{data: array{TransportAd}}
     * @unauthenticated
     */
    public function search(Request $request)
    {
        Validator::make($request->all(), [
            // This is a search string to filter ads by.
            'search' => 'string',

        ]);

        $search = $request->query('search');

        return TransportAd::where('title', 'like', '%' . $search . '%')->get();
    }
}
