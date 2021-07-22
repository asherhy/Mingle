<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telegram', 'gender', 'matric_year', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class)->withTimestamps();
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class)->withTimestamps();
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function postRequests()
    {
        return $this->hasMany(PostRequest::class);
    }

    public function mentorRequests()
    {
        return $this->hasMany(MentorRequest::class);
    }

    public function mentorRequestsM()
    {
        return $this->hasMany(MentorRequest::class, 'mentor_id');
    }

    public function assignRole($role)
    {
        if(is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->sync($role, false);
    }

    public function assignMajor($major)
    {
        if(is_string($major)) {
            $major = Major::whereName($major)->firstOrFail();
        }
        $this->majors()->sync($major, false);
    }

    public function assignModule($module)
    {
        if(is_string($module)) {
            $module = Module::where('code_title', $module)->firstOrFail();
        }
        $this->modules()->sync($module, false);
    }

    public function assignGroup($group)
    {
        $this->groups()->sync($group, false);
    }

    public function allRoles()
    {
        return $this->roles->map->name;
    }
}
