<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    use UsesUuid;

    public $timestamps = false;

    protected $fillable = [
        'community_id',
        'frequency_id',
        'information',
    ];

    protected $hidden = [
        'id',
    ];

    public function community()
    {
       return $this->belongsTo(Option::class, "community_id");
    }

    public function frequency()
    {
       return $this->belongsTo(Option::class, "frequency_id");
    }
}
