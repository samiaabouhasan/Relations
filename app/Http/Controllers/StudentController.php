<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Models\MedicalFile;
use App\Models\Student;
use Illuminate\Http\Request;
use Nette\Schema\Message;

class StudentController extends Controller
{
    // Create Student
    //_______________________
   public function store(StudentStoreRequest $request ){
     $Student=Student::query()->create($request->validated());
      return response()->json([
        'message'=>'Student created successfully',
         'student'=> $Student]
         ,201);
   }

   //Get Student with Medical File
   //______________________________
   public function show($id ){
      $student = Student::with('medicalfile')->findOrFail($id);
      return response()->json(['student'=> $student]
        ,200    );  
}
}
