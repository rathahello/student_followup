<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.addstudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =  User::find(Auth::id());
        $students = new Student();
        $students->firstname = $request->get('firstname');
        $students->lastname = $request->get('lastname');
        $students->class = $request->get('class');
        // $student->tutor = $request->get('tutor');
        $img = $request->file('picture');
        $filename = time() . '.' . $img->getClientOriginalExtension();
        $location = public_path('image/'.$filename);
        Image::make($img)->resize(100,100)->save($location);
        $students->picture = $filename;
        
        $students->description = $request->get('description');
        
        $students->user_id = $user->id;  
        $students->save();
        return redirect('../home'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::find($id);
        return view('students.showdetail',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::find($id);
        return view('students.editstudent',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user =  User::find(Auth::user()->id);
        $student = Student::find($id);
        $student->firstname = $request->get('firstname');
        $student->lastname = $request->get('lastname');
        $student->class = $request->get('class');
        // $student->tutor = $request->get('tutor');
        $student->description = $request->get('description');
        if ($request->hasfile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('image/', $filename);
            $student->picture = $filename;
        }
        $student->user_id = $user->id;  
        $student->save();
        return redirect('../home'); 
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }

    public function outOfFollowup($id)
    {
       
        $student = Student::find($id);
        $student->activeFollowup = false;
        $student->save();
        return back();
        
    }

    public function followUp($id){
        $student = Student::find($id);
        $student->activeFollowup = true;
        $student->save();
        return back();
    }

   
}

