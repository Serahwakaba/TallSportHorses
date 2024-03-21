<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $user = $request->user();

        if ($user['id'] == $id) {
            return User::find($id);
        } else {
            return response([
                'message' => 'Not Allowed'
            ], 401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->user();

        if ($user['id'] != $id) {
            return response([
                'message' => 'Not Allowed'
            ], 401);
        }

        $user_data = User::find($id);
        $user_data->update($request->all());

        return $user_data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response([
            'message' => 'Not Allowed'
        ], 401);
    }
}
