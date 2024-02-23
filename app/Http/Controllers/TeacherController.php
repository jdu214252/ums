<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher =  Teacher::all();
        return view('admin.teacher')->with([
            'teacher' => $teacher, 
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher = Teacher::all();
        return view('admin.teacherCreate')->with(
   [
            'teacher' => $teacher, 
            'subject' => Subject::all()
        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
    
       $teacher = Teacher::create([
            'name' => $request->input('name'),
            'user_id' => $user_id,
        ]);

        if(isset($request->subjects)){
            foreach($request->subjects as $subject){
                $teacher->subjects()->attach($subject);
                // dd($teacher->subjects);
            }
        }
    
        return redirect()->route('teacher.index'); // Assuming you have a route named 'teacher.index'
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teacherEdit', ['teacher' => $teacher]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update([
            'name' => $request->input('name'),
            'user_id' => Auth::user()->id,
        ]);
    
        return redirect()->route('teacher.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index');
    }
}
