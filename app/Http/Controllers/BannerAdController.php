<?php

namespace App\Http\Controllers;

use App\Models\BannerAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerAdController extends Controller
{
    /**
     * Display all ads.
     * 
     * @response array{data: array{BannerAd},"current_page": 1,"next_page_url": null,"total": 4}
     * @unauthenticated
     */
    public function index()
    {
        return BannerAd::all();
    }

    /**
     * Create ad.
     * 
     * @response array{status:'success',data: BannerAd}
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'link' => 'required',
            'images' => 'array',
            'position' => 'string'
        ]);

        $user_id = $request->user()['id'];
        $data_to_save = $request->all();
        $data_to_save['user_id'] = $user_id;

        return BannerAd::create($data_to_save);
    }

    /**
     * Find ad by id
     * 
     * @param string $id unique id of the ad
     * 
     * @response BannerAd
     * @unauthenticated
     */
    public function show(string $id)
    {
        return BannerAd::find($id);
    }

    /**
     * Update ad
     * 
     * @param string $id The unique id of the ad resource
     * 
     * @response array{'status':'success', data: BannerAd}
     */
    public function update(Request $request, string $id)
    {
        $ad = BannerAd::find($id);
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
        return BannerAd::destroy($id);
    }

    /**
     * Search
     * 
     * Search for a specific ad by a query string.
     * 
     * @response array{data: array{BannerAd}}
     * @unauthenticated
     */
    public function search(Request $request)
    {
        Validator::make($request->all(), [
            // This is a search string to filter ads by.
            'search' => 'string',

        ]);

        $search = $request->query('search');

        return BannerAd::where('title', 'like', '%' . $search . '%')->get();
    }
}
