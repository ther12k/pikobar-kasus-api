<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => Arr::first($user->getRoleNames()),
            'permissions' => $user->getAllPermissions()->pluck('name'),
        ];
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        return tap($user)->update($request->only('name', 'email'));
    }
}
