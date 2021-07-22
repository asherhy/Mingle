<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function mentorRequests()
    {
        return $this->hasMany(MentorRequest::class);
    }

}
