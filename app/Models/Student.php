<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(["name"])]
class Student extends Model
{
    //
    public function medicalfile(){
        return $this->hasOne(MedicalFile::class);
    }
}
