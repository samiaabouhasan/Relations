<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalFileStoreRequest;
use App\Http\Requests\MedicalFileUpdateRequest;
use App\Models\MedicalFile;
use App\Models\Student;
use Illuminate\Http\Request;

class MedicalFileController extends Controller
{
  // Create Medical File for a Student
  //_______________________
  public function store(MedicalFileStoreRequest $request, $student_id)
  {
    $student = Student::findOrFail($student_id);
    if ($student->medicalfile) {
      return response()->json(
        [
          'message' => 'This student has Medicalfile',
        ],
        409
      );
    } else {
      $Medicalfile = $student->medicalfile()->create($request->validated());
      return response()->json(
        [
          'message' => 'Medical file created successfully',
          'Medicalfile' => $Medicalfile
        ],
        201
      );
    }
  }

  //Get Medical File by Student
  //_______________________________
  public function show($id)
  {
    $medicalfile = MedicalFile::with('student')->findOrFail($id);
    return response()->json(
      ['medicalfile' => $medicalfile],
      200
    );
  }

  //Update Medical File
  //____________________________
  public function update(MedicalFileUpdateRequest $request, $id)
  {
    $medicalfile = MedicalFile::findOrFail($id);
    $medicalfile->update($request->validated());
    return response()->json(
      $medicalfile,
      200
    );
  }
}
