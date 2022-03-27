<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_mdl extends Model
{
    protected $table 		= 'tbl_categories';
    protected $primarykey 	= 'id';
    protected $fillable 	= ['name', 'slug', 'parent_id'];

    public function childs()
    {
    	return $this->hasMany('App\Models\Category_mdl', 'parent_id');
    }

    public function parent()
    {
    	return $this->belongsTo('App\Models\Category_mdl', 'parent_id');
    }
}
