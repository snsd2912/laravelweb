<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDAO extends Controller
{
    /**
     * Create a new user instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $user = new User();
        $user->usrname = $request->get('usrname');
        $user->password = bcrypt($request->get('password'));
        $user->name = $request->get('name');
        $user->pos = 2;
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');

        $user->save();
    }

    /**
     * Return list of students
     *
     */
    public function stulist(){
        return User::where('pos',2)->get();
    }

    /**
     * Return all users
     *
     */
    public function userlist(){
        return User::all();
    }

    /**
     * Get user by id
     *
     */
    public function getUserById($id){
        return User::where('id', $id)->get()->first();
    }

    /**
     * Update information 
     *
     */
    public function update($newuser){
        $user = User::find($newuser->id);
        $user->usrname = $newuser->usrname;
        $user->name = $newuser->name;
        $user->email = $newuser->email;
        $user->phone = $newuser->phone;

        $user->save();
    }

    /**
     * Update password
     *
     */
    public function updatePwd($newuser, $id){
        $user = User::find($id);
        $user->password = bcrypt($newuser->password);

        $user->save();
    }

}
