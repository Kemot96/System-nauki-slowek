<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($id)
 */
class Set extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted'];
    const DELETED_AT = 'deleted';

    protected $fillable = [
        'languages1_id',
        'languages2_id',
        'subcategories_id',
        'users_id',
        'name',
        'words',
        'number_of_words',
    ];

    protected $hidden = [
        'timestamps',
        'id',
    ];

    public function language1()
    {
        return $this->belongsTo('App\Language', 'languages1_id');
    }

    public function language2()
    {
        return $this->belongsTo('App\Language', 'languages2_id');
    }

    public function subcategorie()
    {
        return $this->belongsTo('App\Subcategorie', 'subcategories_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

}
