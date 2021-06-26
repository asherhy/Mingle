<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleMatch extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'match_data'
    ];

    protected $casts = [
        'match_data' => 'array',
    ];
}
