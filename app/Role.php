<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted'];
    const DELETED_AT = 'deleted';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = [
        'timestamps',
        'deleted',
        'id',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_roles', 'roles_id', 'users_id');
    }

    public function subcategories()
    {
        return $this->belongsToMany('App\Subcategorie', 'subcat_roles', 'roles_id', 'subcategories_id');
    }
}
