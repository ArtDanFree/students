<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['full_name', 'dob', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function subject()
    {
        return $this->belongsToMany(Subject::class, 'subjects_values')->withPivot('value', 'id');
    }

    public static function updateStudent($request, $id)
    {
        $student = Student::find($id);
        $student->full_name = $request->full_name;
        $student->dob = $request->dob;
        if (!empty($request->group_id)) {
            $student->group_id = $request->group_id;
        }
        return $student->save();
    }

    public static function converter($subjectsValues)
    {
        $subjectId = [] ;
        foreach ($subjectsValues as $subjectsValueq) {
            // удаляю из коллекции student_id, преобразуют ее в массив.
            //добавляю в массив $subjectId id предметов, которым не выставили оценки.
            $subjectId[] = collect($subjectsValueq)->forget('student_id')->toArray()['subject_id'];
        }
        // возвращаю предметы которым не выставили оценки.
        return Subject::whereNotIn('id', $subjectId)->get();
    }

    public static function createStudentValue($request, $subjectId)
    {
        $data = [];
        foreach ($request as $idSubject => $value) {
            if ($idSubject == '_token') {
                continue;
            }
            $data[] = [
                'subject_id' => $idSubject,
                'value' => $value,
                'student_id' => $subjectId,

            ];
        }
        return SubjectsValue::insert($data);
    }
    public static function converterUpdate($request, $studentId)
    {
        $data = [];
        foreach ($request as $subjectId => $value) {
            if ($subjectId == '_token') {
                continue;
            }
            $data[] = [
                'subject_id' => $subjectId,
                'value' => $value,
            ];
        }
        $student = Student::find($studentId);
        foreach ($data as $item) {
            $student->subject()->updateExistingPivot($item['subject_id'], ['value' => $item['value']]);
        }
        return;
    }
}
