<?php

namespace App\Http\Controllers;

use App\Models\HorseAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HorseAdsController extends Controller
{
    /**
     * Display all ads.
     * 
     * @response array{data: array{HorseAd},"current_page": 1,"next_page_url": null,"total": 4}
     * @unauthenticated
     */
    public function index(Request $request)
    {


        $data = HorseAd::paginate(request()->all());
        return response($data, 200);
    }

    /**
     * Create horse ad.
     * 
     * @response array{status:'success',data: HorseAd}
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'predicate' => 'string',
            'type' => 'string',
            'age' => 'int',
            'level' => 'string',
            'description' => 'required',
            'gender' => 'string',
            'studbook' => 'string',
            'color' => 'string',
            'withers_length' => 'double',
            'price' => 'int',
            'poa' => 'bool',
            'xray_approved' => 'bool',
            'xray_approved_date' => 'date',
            'clinical_proven' => 'bool',
            'clinical_proven_date' => 'date',
            'family_tree' => 'json',
            'video_link' => 'array',
            'images' => 'array',
            'achievements' => 'array',

        ]);

        $user_id = $request->user()['id'];
        $data_to_save = $request->all();
        $data_to_save['user_id'] = $user_id;

        $ad = HorseAd::create($data_to_save);

        $res = [
            'status' => 'success',
            'data' => $ad
        ];

        return response($res);
    }

    /**
     * Find and return a horse ad by id
     * 
     * @param string $id unique id of the ad
     * 
     * @response HorseAd
     * @unauthenticated
     */
    public function show(string $id)
    {
        return HorseAd::find($id);
    }

    /**
     * Update a horse ad item by id
     * 
     * @param string $id The unique id of the ad resource
     * 
     * @response array{'status':'success', data: HorseAd}
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'string',
            'category' => 'string',
            'predicate' => 'string',
            'type' => 'string',
            'age' => 'int',
            'level' => 'string',
            'description' => 'string',
            'gender' => 'string',
            'studbook' => 'string',
            'color' => 'string',
            'withers_length' => 'double',
            'price' => 'int',
            'poa' => 'bool',
            'xray_approved' => 'bool',
            'xray_approved_date' => 'date',
            'clinical_proven' => 'bool',
            'clinical_proven_date' => 'date',
            'family_tree' => 'json',
            'video_link' => 'array',
            'images' => 'array',
            'achievements' => 'array',
            'published' => 'bool'

        ]);

        $ad = HorseAd::find($id);
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
        return HorseAd::destroy($id);
    }

    /**
     * Search
     * 
     * Search for a specific ad by a query string.
     * 
     * @response array{data: array{HorseAd}}
     * @unauthenticated
     */
    public function search(Request $request)
    {
        Validator::make($request->all(), [
            // This is a search string to filter ads by.
            'search' => 'string',

        ]);

        $search = $request->query('search');

        return HorseAd::where('title', 'like', '%' . $search . '%')->paginate();
    }
}
