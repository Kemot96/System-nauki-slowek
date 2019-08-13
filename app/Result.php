<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'sets_id',
        'users_id',
        'date',
        'percent',
    ];

    protected $hidden = [
        'id',
    ];

    public function set()
    {
        return $this->belongsTo('App\Set', 'sets_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }



    public $timestamps = false;
}
