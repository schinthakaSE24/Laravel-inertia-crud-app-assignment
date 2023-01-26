<?php

namespace domain\services;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

class StudentServices
{
    protected $student;
    public function __Construct()
    {
        $this->student=new Student();
    }
    public function all(){
        return $this->student->all();
    }
    
//store upadte delete functions
    public function store()
    {
     
        $image = Request::file('image')->store('student','public');
        Student::create([
                'name' => Request::input('name'),
                'age' => Request::input('age'),
                'image' => $image,
                'status' => Request::input('status')
        ]);
        
    }


   public function update($student)
    {
        $image = $student->image;
        if(Request::file('image')){
            Storage::delete('public/'.$student->image);
            $image = Request::file('image')->store('student','public');
        }
        $student->update([
            'name' => Request::input('name'),
            'age' => Request::input('age'),
            'image' => $image,
            'status' => Request::input('status')
        ]);
     
    }

    
    public function destroy($student)
    {
        Storage::delete('public/'.$student->image);
        $student->delete();
       
    }
}

?>