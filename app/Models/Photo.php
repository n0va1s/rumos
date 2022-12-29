<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'course_photos';

    protected $fillable = [
        'course_id',
        'url',
    ];


    protected $hidden = [
        'id',
    ];

    /**
     * Get the url without public/ string on path
     * this is important to show the image correctly
     * public/ is necessary to storage folder
     * wrong: public/cursos/brasilia/2022-1000.jpg
     * right: cursos/brasilia/2022-1000.jpg
     * @return string
     */
    public function getUrlAttribute($value)
    {
        return str_replace("public/", "", $value);
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class, "course_id");
    }
}
