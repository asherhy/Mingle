<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'detail', 'module_id', 'status', 'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
