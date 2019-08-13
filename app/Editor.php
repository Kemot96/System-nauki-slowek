<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    protected $fillable = [
        'users_id',
        'supereditor',
        'subcategories_id',
    ];

    protected $hidden = [
        'id',
    ];

    public function subcategorie()
    {
        return $this->belongsTo('App\Subcategorie', 'subcategories_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public $timestamps = false;
}
