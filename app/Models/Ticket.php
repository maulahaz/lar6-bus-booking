<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo(Category_mdl::class,'category_id');
    }
}
