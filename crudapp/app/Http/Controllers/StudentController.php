<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use domain\facades\StudentFacade;
use App\Models\Student;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;
class StudentController extends Controller
{
    public function index()
    {
            $student['students'] = Student::all() -> map(function($student){
                
                return[
                    'id' => $student->id,
                    'name' => $student->name,
                    'image' =>asset('storage/'.$student->image),
                    'age' => $student->age,
                    'status' => $student->status
                ];
            });
            
        return Inertia::render('students',$student);
       
    }

    public function create()
    {
        return Inertia::render('Student/Create');
    }

    public function store(Request $request)
    {
        StudentFacade::store($request->all());
        return Redirect::route('students');
    }

    
    public function show(Student $student)
    {
        return Inertia::render('Student/View',[
                 'student' => $student,
                 'image' => asset('storage/'.$student->image),
        ]);
    }

    
    public function edit(Student $student)
    {
        return Inertia::render('Student/Edit',[
            'student' => $student,
            'image' => asset('storage/'.$student->image),
        ]);
    }

    
    public function update( Student $student)
    {
        
        StudentFacade::update($student);
        return Redirect::route('students');
    }

    
    public function destroy(Student $student)
    { 
        StudentFacade::destroy($student);
        return Redirect::route('students');
    }
    
}


   


