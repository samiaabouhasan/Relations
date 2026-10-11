<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Fillable(["student_id","blood_type" , "emergency_phone_number"])]
//#[Table("medical_files")]
class MedicalFile extends Model
{
    //
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
