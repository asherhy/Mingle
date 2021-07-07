<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modules', 'group_type', 'respective_id', 'title', 'user_info'
    ];

    protected $casts = [
        'user_info' => 'array',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
