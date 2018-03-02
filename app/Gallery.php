<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Gallery extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public static function resizeAndCreate($image)
    {
        //сохранение картинки в исходном размере
        $img = \Storage::putFile('public/gallery', $image);

        // сохранение картинки для превью
        $path = \Storage::path('public/gallery/' . $image->hashName());
        $resizePreviewImg = Image::make($path)->resize(200, 200);
        $resizePreviewImg->save($resizePreviewImg->dirname . '/preview' . $resizePreviewImg->basename);

        //запись в БД
        $gallery = new Gallery();
        $gallery->student_id = \Auth::id();
        $gallery->img = \Storage::url($img);
        $gallery->preview_img = \Storage::url('public/gallery/preview' . $image->hashName());
        $gallery->save();
    }
}
