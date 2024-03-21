<?php

namespace App\Http\Controllers;

use App\Models\RealEstateAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RealEstateAdsController extends Controller
{
    /**
     * Display all ads.
     * 
     * @response array{data: array{RealEstateAd}}
     * @unauthenticated
     */
    public function index()
    {
        return RealEstateAd::all();
    }

    /**
     * Create a new transport ad
     * 
     * @response array{status:'success',data: {RealEstateAd}}
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'int',
            'poa' => 'bool',
            'country' => 'required',
            'province' => 'required',
            'address' => 'required',
            'zip_code' => 'string',
            'place' => 'string',
            'year_of_construction' => 'int',
            'size' => 'int',
            'amenities' => 'string',
            'video_link' => 'array',
            'images' => 'array',

        ]);

        $user_id = $request->user()['id'];
        $data_to_save = $request->all();
        $data_to_save['user_id'] = $user_id;

        $ad = RealEstateAd::create($data_to_save);

        $res = [
            'status' => 'success',
            'data' => $ad
        ];

        return response($res);
    }

    /**
     * Find ad by id
     * 
     * @param string $id unique id of the ad
     * 
     * @response RealEstateAd
     * @unauthenticated
     */
    public function show(string $id)
    {
        return RealEstateAd::find($id);
    }

    /**
     * Update ad
     * 
     * @param string $id The unique id of the ad resource
     * 
     * @response array{'status':'success', data: RealEstateAd}
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'int',
            'poa' => 'bool',
            'country' => 'required',
            'province' => 'required',
            'address' => 'required',
            'zip_code' => 'string',
            'place' => 'string',
            'year_of_construction' => 'int',
            'size' => 'int',
            'amenities' => 'string',
            'video_link' => 'array',
            'images' => 'array',

        ]);

        $ad = RealEstateAd::find($id);
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
        return RealEstateAd::destroy($id);
    }

    /**
     * Search
     * 
     * Search for a specific ad by a query string.
     * 
     * @response array{data: array{RealEstateAd}}
     * @unauthenticated
     */
    public function search(Request $request)
    {
        Validator::make($request->all(), [
            // This is a search string to filter ads by.
            'search' => 'string',

        ]);
        $search = $request->query('search');

        return RealEstateAd::where('title', 'like', '%' . $search . '%')->get();
    }
}
