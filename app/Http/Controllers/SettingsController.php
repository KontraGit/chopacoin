<?php

namespace App\Http\Controllers;

use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('dashboard.settings.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUserProfile(Request $request)
    {
        if ($request->has('name')) {
            $request->validate([
                'name' => 'string',
            ]);

            $request['name'] = ucfirst($request->name);
        }

        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'mimes:jpg,jpeg,png|max:3000',
            ]);

            $upload = (new UploadApi())->upload($request->avatar->path(), [
                'folder' => 'coinchoppa/images/users/',
                'public_id' => $request->user()->email,
                'overwrite' => true,
                // 'notification_url' => '',
                'resource_type' => 'image'
            ]);

            $request['photo'] = $upload['secure_url'];
        }


        $request->user()->update($request->all());

        alert()->success('Your user profile has been updated.', 'Saved!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateContactProfile(Request $request)
    {
        if ($request->has('email')) {
            $request->validate([
                'email' => 'email|unique:users,email,' . $request->user()->id,
            ]);

            $request['email_verified_at'] = null;
        }

        $request->user()->update($request->all());

        alert()->success('Your account profile has been updated.', 'Saved!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePersonalInfo(Request $request)
    {
        $request->validate([
            'date_of_birth' => 'required|date',
            'street' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|integer',
        ]);

        $request['dob'] = $request->date_of_birth;

        $request->user()->update($request->all());

        alert()->success('Your personal info has been updated.', 'Saved!');

        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function preferences()
    {
        return view('dashboard.settings.preferences');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePreferences(Request $request)
    {
        $request->validate([
            'currency' => 'required|string',
            // 'time_zone' => 'required|string',
        ]);

        $request->user()->wallet->update($request->all());

        alert()->success('Your preferences has been updated.', 'Saved!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateNotifier(Request $request)
    {
        switch ($request->login_notifier) {
            case 'on':
                # code...
                $request['login_notifier'] = true;
                break;

            default:
                # code...
                $request['login_notifier'] = false;
                break;
        }

        switch ($request->transaction_notifier) {
            case 'on':
                # code...
                $request['transaction_notifier'] = true;
                break;

            default:
                # code...
                $request['transaction_notifier'] = false;
                break;
        }

        switch ($request->recommendation_notifier) {
            case 'on':
                # code...
                $request['recommendation_notifier'] = true;
                break;

            default:
                # code...
                $request['recommendation_notifier'] = false;
                break;
        }

        $request->user()->preference->update($request->all());

        alert()->success('Your preferences has been updated.', 'Saved!');

        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function security()
    {
        return view('dashboard.settings.security');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($request) {
                if (!Hash::check($value, $request->user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => 'required|same:password_confirmation',
        ]);

        $request->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        alert()->success('Your password has been updated.', 'Saved!');

        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accounts()
    {
        return view('dashboard.settings.accounts');
    }
}
