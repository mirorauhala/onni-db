<?php

namespace App\Http\Controllers\Settings;

use Auth;
use Illuminate\Http\Request;
use App\Rules\CurrentPassword;
use App\Http\Controllers\Controller;

class SettingsPasswordController extends Controller
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
     * Show password change form.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        return view('settings.password')->with(['user' => $user]);
    }

    /**
     * Update password.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'current_password'          => ['required', 'string', new CurrentPassword()],
            'new_password'              => 'required|string|min:8|different:current_password',
            'new_password_confirmation' => 'required|string|same:new_password',
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->new_password),
        ]);

        return redirect()
            ->route('settings.password')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Settings saved.',
            ]);
    }
}
