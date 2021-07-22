<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'mentor_id', 'detail', 'module_id', 'status', 'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

}
