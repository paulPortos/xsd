<?php

namespace App\Http\Controllers;


use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller{


    public function destroy(int $id){
        $teachers = Teachers::findOrFail($id);
        $teachers->delete();
        return redirect()->back()->with('status', 'Category Deleted');
    }

    public function update(Request $request, int $id){
        $request->validate([
            'name' => 'required|max:255|string',
            'age' => 'required|max:255|integer',
            'address' => 'required|max:255|string',
            'department' => 'required|max:255|string',
        ]);

        Teachers::findOrFail($id)->update([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'department' => $request->department,
        ]);

        return redirect()->back()->with('status', 'Teacher Updated');
    }

    public function edit(int $id){
        $teachers = Teachers::findOrFail($id);
        return view('myview.editteachers', compact('teachers'));
    }

    public function store (Request $request)  {

        $request->validate([
            'name' => 'required|max:255|string',
            'age' => 'required|max:255|integer',
            'address' => 'required|max:255|string',
            'department' => 'required|max:255|string',
        ]);

        Teachers::create([
            'name' =>$request->name,
            'age' =>$request->age,
            'address' =>$request->address,
            'department' =>$request->department,
        ]);

        return redirect('myview/createteachers')->with('status', 'Teacher Created');

    }


    public function create(){
        return view ('myview.createteachers');
    }



    public function index(){
        $teachers = Teachers::get();
        return view ('myview.teachers', compact('teachers'));
    }


    public function get()
    {
    $teachers = Teachers::all();

    return response()->json(['message' => 'GET request received successfully', 'data' => $teachers]);
    }   

    public function adding(Request $request)  {

        $items = new Teachers();
        $items->name =$request->name;
        $items->age =$request->age;
        $items->address =$request->address;
        $items->department =$request->department;

        $items->save();

        return response()->json('Added Succesfully!');
    }

    public function apiedit (Request $request) {

        $items = Teachers::findorfail($request->id);

        $items->name =$request->name;
        $items->age =$request->age;
        $items->address =$request->address;
        $items->department =$request->department;

        $items->update();

        return response()->json('Updated Succesfully!');

    }

    public function delete(Request $request) {
        $items = Teachers::findorfail($request->id)->delete();
        return response()->json('Deleted Succesfully!');
    }

};
                                                                                                                            