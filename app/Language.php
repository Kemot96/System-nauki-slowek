<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted'];
    const DELETED_AT = 'deleted';

    protected $fillable = [
        'name',
        'symbol',
    ];

    protected $hidden = [
        'deleted','id',
    ];

    public $timestamps = false;

}
