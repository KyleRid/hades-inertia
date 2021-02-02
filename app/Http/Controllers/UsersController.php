<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'role' => Rule::in(['client', 'admin', 'accountant']),
            'currency' => [
                'required',
                Rule::in(['EUR', 'RUB', 'USD'])
            ],
            'login' => 'alpha_num|unique:users|nullable',
            'verified' => 'Boolean',
            'gender' => 'Boolean',
            'birthdate' => 'Date|nullable',
            'iban' => 'string|nullable',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'currency' => $request->currency,
            'login' => $request->login,
            'verified' => $request->verified,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'iban' => $request->iban,
        ]);

        return redirect()->route('users.index')->with('successMessage', 'User was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->get();
        return Inertia::render('Users/Info', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->get();
        return Inertia::render('Users/Edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        // ]);
        User::whereId($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }
}
