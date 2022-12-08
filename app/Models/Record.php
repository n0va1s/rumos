<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'person_id',
        'presenter_id',
        'reason',
        'other_information',
        'has_agreement',
        'has_first_communion',
        'has_chrism',
        'is_approved',
    ];

    protected $hidden = [
        'id',
    ];

    protected $casts = [
        'has_agreement' => 'boolean',
        'has_first_communion' => 'boolean',
        'has_chrism' => 'boolean',
        'is_approved' => 'boolean',
    ];

    public function person()
    {
        return $this->belongsTo(People::class, "person_id");
    }

    public function presenter()
    {
        return $this->belongsTo(People::class, "presenter_id");
    }
}
