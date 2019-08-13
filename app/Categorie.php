<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{


    use SoftDeletes;
    protected $dates = ['deleted'];
    const DELETED_AT = 'deleted';

    protected $fillable = [
        'name',
        'description',
        'picture_file_name',
    ];

    protected $hidden = [
        'timestamps',
        'id',
    ];

    public function subcategories()
    {
        return $this->hasMany('App\Subcategorie', 'id', 'categories_id');
    }


}
