<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCollection;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $teacher = Teacher::all();

        return new TeacherCollection($teacher);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
        ]);


        $teacher = Teacher::create([
            'name' => $request->name,
            'user_id' => $request->user_id,

        ]);

        return new TeacherResource($teacher);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::find($id);

        if(!$teacher){
            return response([
                'code' => "404",
                'message' => "Bunaqa O'qituvchi yo'q"
            ]);
        }

        return new TeacherResource($teacher);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
        ]);

        $teacher = Teacher::find($id);

        if(!$teacher){
            return response([
                'code' => "404",
                'message' => "Bunaqa O'qituvchi yo'q"
            ]);
        }

        $teacher->update([
            'name' => $request->name,
            'user_id' => $request->user_id,

        ]);

        return new TeacherResource($teacher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);

        if(!$teacher){
            return response([
                'code' => "404",
                'message' => "Bunaqa O'qituvchi yo'q"
            ]);
        }

        $teacher->delete();

        return response([
            'code' => "200",
            'message' => "O'qitivchi malimotlari o'chirildi"
        ]);

    }
}
