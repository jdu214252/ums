<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.index' , ['talabalar' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        // return view('admin.create', ['guruhlar' => $groups]);

        return view('admin.create')->with([
            'guruhlar' => $groups,
            'tags' => Tag::all(),
        ]);

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
       $student =  Student::create([
            'student_id' => $request->student_id ,
            'name' => $request->name ,
            'lastname' => $request->lastname,
            'group_id' => $request->group,
            'user_id' => Auth::user()->id,
        ]);
        if(isset($request->tags)){
            foreach($request->tags as $tag){
                $student->tags()->attach($tag);
            }
        }
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $guruhlar = Group::all(); 

        //allows(ni) o'rniga denes degan(ni) bor faqat ! <- shu belgini olib tashlash kere
        if(!Gate::allows('edit-student', $student)){
            return abort(403);       
        }
        
        return view('admin.edit', ['talaba' => $student, 'guruhlar' => $guruhlar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'group_id' => $request->group,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
