<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//import User.php
use App\Models\User;



class UserController extends Controller
{



    /**
     * Display a listing of all current users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created User in storage.
     * Requires a first name, last name, and unique email address.
    */

    public function store(Request $request)
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        return User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email')
        ]);
    }


    /** 
     * Update the User that corresponds to the given id. 
     * Requires at least one field filled among first name, last name, and email.
     * 
    */
    public function update(Request $request, $id) 
    {

        //validate that at least one field is filled other than id
        $request->validate([
            'first_name' => 'required_without_all:last_name, email',
            'last_name' => 'required_with\out_all:first_name, email',
            'email' => 'required_without_all:first_name, last_name'
        ]);
        
        // get all data passed in
        $data = $request->all();
        
        // grab the user record that we want to update, referenced by id
        $user = User::find($id);
        
        $user->fill($data);

        $user->save();

        return redirect('/users')->with('success', 'User updated!');

    }

    
}
