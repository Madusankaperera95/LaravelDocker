<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getStudents(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $age = $request->age;
        $grade = $request->grade;


//        $students = Student::query();
//
//        if($email){
//            $students->where('email','like','%'.$email.'%');
//        }
//
//        if($name){
//            $students->where('name','like','%'.$name.'%');
//        }
//
//        if($age){
//            $students->where('age','>',$age);
//        }
//
//        if($grade){
//            $students->where('grade',$grade);
//        }

        $students = Student::query()
                             ->when($name, function ($query) use($name){
                                 return $query->where('name','like','%'.$name.'%');
                             })->when($email,function ($query) use ($email){
                                 return $query->where('email','like','%'.$email.'%');
                              })->when($age,function ($query) use ($age){
                                 return $query->where('age','>',$age);
                              })->when($grade,function ($query) use ($grade){
                                 return $query->where('grade',$grade);
                              })->get();




        return response()->json(['students' => $students],200);


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
    public function store(StudentRequest $request)
    {

         dd($request->all());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
