<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'person_contacts';

    protected $fillable = [
        'person_id',
        'type_id',
        'contact',
    ];


    protected $hidden = [
        'id',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, "person_id");
    }

    public function type()
    {
        return $this->belongsTo(Option::class, "type_id");
    }
}
