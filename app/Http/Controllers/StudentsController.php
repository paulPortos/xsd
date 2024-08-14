<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller{

    public function destroy(int $id){
        $students = Students::findOrFail($id);
        $students->delete();
        return redirect()->back()->with('status', 'Student Deleted');
    }

    public function update(Request $request, int $id){
        $request->validate([
            'name' => 'required|max:255|string',
            'age' => 'required|max:255|integer',
            'address' => 'required|max:255|string',
            'course' => 'required|max:255|string',
            'subject' => 'required|max:255|string',
        ]);

        Students::findOrFail($id)->update([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'course' => $request->course,
            'subject' => $request->subject,
        ]);

        return redirect()->back()->with('status', 'Students Updated');
    }

    public function edit(int $id){
        $students = Students::findOrFail($id);
        return view('myview.editstudents', compact('students'));
    }

    public function store (Request $request)  {

        $request->validate([
            'name' => 'required|max:255|string',
            'age' => 'required|max:255|integer',
            'address' => 'required|max:255|string',
            'course' => 'required|max:255|string',
            'subject' => 'required|max:255|string',
        ]);

        Students::create([
            'name' =>$request->name,
            'age' =>$request->age,
            'address' =>$request->address,
            'course' =>$request->course,
            'subject' =>$request->subject,

        ]);

        return redirect('myview/createstudents')->with('status', 'Student Created');

    }


    public function create(){
        return view ('myview.createstudents');
    }



    public function index(){
        $students = Students::get();
        return view ('myview.students', compact('students'));
    }


    public function get()
    {
    $students = Students::all();

    return response()->json(['message' => 'GET request received successfully', 'data' => $students]);
    }   

    
    public function adding(Request $request)  {
        $items = new Students();
        $items->name =$request->name;
        $items->age =$request->age;
        $items->address =$request->address;
        $items->course =$request->course;
        $items->subject =$request->subject;

        $items->save();

        return response()->json('Added Succesfully!');
    
    }

    public function apiedit(Request $request) {

        $items = Students::findorfail($request->id);

        $items->name =$request->name;
        $items->age =$request->age;
        $items->address =$request->address;
        $items->course =$request->course;
        $items->subject =$request->subject;

        $items->update();

        return response()->json('Updated Succesfully!');
        
    }

    public function delete(Request $request) {
        $items = Students::findorfail($request->id)->delete();
        return response()->json('Deleted Succesfully!');
    }

};
