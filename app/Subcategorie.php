<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategorie extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted'];
    const DELETED_AT = 'deleted';

    protected $fillable = [
        'categories_id',
        'name',
        'description',
        'picture_file_name',
    ];

    protected $hidden = [
        'timestamps',
        'id',
    ];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie', 'categories_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'subcat_roles', 'subcategories_id', 'roles_id');
    }

    public function has($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }
}
