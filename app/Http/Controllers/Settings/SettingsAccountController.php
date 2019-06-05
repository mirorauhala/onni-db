<?php

namespace App\Http\Controllers\Settings;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SettingsAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        return view('settings.account')->with(['user' => $user]);
    }

    /**
     * Update account data.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|min:1',
            'username' => [
                'required',
                Rule::unique('users')->ignore($request->user()->id)
            ]
        ]);

        $request->user()->update([
            'name'  => $request->name,
            'username' => $request->username,
        ]);

        return redirect()
            ->route('settings.account')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Settings saved.',
            ]);
    }
}
