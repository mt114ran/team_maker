<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'content', 
        'user_id', 
        'location_add', 
        'sports_name',
        'rec_num',
        'max_num',
        'now_num',
        'title',
        'location'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
