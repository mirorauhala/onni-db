<?php

namespace App\Http\Controllers\Settings;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
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
    public function index()
    {
        $user = Auth::user();

        return view('settings.profile')->with(['user' => $user]);
    }

    /**
     * Store settings to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|min:1',
            'email' => 'required|email',
        ]);

        Auth::user()->update(
            [
                'name'              => $request->name,
                'email'             => $request->email,
            ]
        );

        return redirect()
            ->route('settings.profile')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Settings saved.',
            ]);
    }
}
