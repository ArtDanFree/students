<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectsValue extends Model
{
    protected $fillable = ['student_id', 'subject_id', 'value'];
    public function subject()
    {
        $this->hasManyThrough(Subject::class, Student::class, 'user_id', 'id', 'id');
    }
}
