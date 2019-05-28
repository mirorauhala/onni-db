<?php

namespace App\Http\Controllers\Settings;

use Auth;
use Illuminate\Http\Request;
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
            'email' => 'required|email',
        ]);

        $request->user()->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('settings.account')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Settings saved.',
            ]);
    }
}
