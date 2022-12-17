<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'course_photo';

    protected $fillable = [
        'course_id',
        'photo',
    ];


    protected $hidden = [
        'id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, "course_id");
    }
}
