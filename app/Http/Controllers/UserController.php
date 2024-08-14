<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function get()
    {
    $user = User::all();

    return response()->json(['message' => 'GET request received successfully', 'data' => $user]);
    }   

    public function adding(Request $request)  {

        $items = new User();
        $items->name =$request->name;
        $items->email =$request->email;
        $items->password =$request->password;

        $items->save();

        return response()->json('Added Succesfully!');
    }

    public function edit (Request $request) {

        $items = User::findorfail($request->id);

        $items->name =$request->name;
        $items->email =$request->email;
        $items->password =$request->password;

        $items->update();

        return response()->json('Updated Succesfully!');

    }

    public function delete(Request $request) {
        $items = User::findorfail($request->id)->delete();
        return response()->json('Deleted Succesfully!');
    }

}
