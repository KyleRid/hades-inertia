<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Posts/Index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->get();
        return Inertia::render('Posts/Show', [
            'post' => $post,
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
        $post = Post::where('id', $id)->get();
        return Inertia::render('Posts/Edit', [
            'post' => $post,
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
        var_dump($request);
        // $user = Post::whereId($id)->get()[0];
        // $updatedFields = array(
        //     'name' => $request->name,
        //     'role_id' => $request->role_id,
        //     'currency' => $request->currency,
        //     'login' => $request->login,
        //     'verified' => $request->verified,
        //     'gender' => $request->gender,
        //     'birthdate' => $request->birthdate,
        //     'iban' => $request->iban,
        // );
        // $validateFields = array(
        //     'name' => 'required|alpha',
        //     'role_id' => 'required|numeric',
        //     'currency' => [
        //         'required',
        //         Rule::in(['EUR', 'RUB', 'USD'])
        //     ],
        //     'login' => 'alpha_num|unique:users|nullable',
        //     'verified' => 'Boolean',
        //     'gender' => 'Boolean',
        //     'birthdate' => 'Date|nullable',
        //     'iban' => 'string|nullable',
        // );
        // if ($user->email !== $request->email) {
        //     $updatedFields['email'] = $request->email;
        //     $validateFields['email'] = 'required|email|unique:users';
        // }

        // if (isset($request->password) && $user->password !== bcrypt($request->password)) {
        //     $updatedFields['email'] = $request->password;
        //     $validateFields['password'] = 'required|min:5';
        // }


        // $request->validate($validateFields);

        // User::whereId($id)->update($updatedFields);
        // return redirect()->route('users.index')->with('successMessage', 'User has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
