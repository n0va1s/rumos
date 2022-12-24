<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'person_addresses';

    protected $fillable = [
        'person_id',
        'state_id',
        'description',
        'number',
        'city',
        'zipcode',
    ];


    protected $hidden = [
        'id',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, "person_id");
    }
}
