<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];

    public function student()
    {
        $this->belongsToMany(Student::class, 'subjects_values', 'subject_id', 'id');
    }
}
