<?php

namespace OWS\Http\Controllers;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use OWS\Http\Requests\UserCreateRequest;
use OWS\Http\Requests\UserUpdateRequest;
use OWS\User;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        return redirect()
            ->to(route('users.edit', [
                'id' => $user->id
            ]))
            ->with(['status' => 'User created!']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, UserUpdateRequest $request)
    {
        if($request->name !== null) {
            $user->name = $request->name;
        }
        if($request->email !== null) {
            $user->email = $request->email;
        }
        if($request->password !== null) {
            $user->password = $request->password;
        }

        $user->save();

        return redirect()
            ->to(route('users.edit', [
                'id' => $user->id
            ]))
            ->with(['status' => 'User updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user, Request $request)
    {
        if($user->id != $request->user()->id) {
            $user->delete();
        }

        return redirect()
            ->to(route('users.index'))
            ->with(['status' => 'User deleted!']);
    }
}
