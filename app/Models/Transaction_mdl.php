<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction_mdl extends Model
{
    protected $table = 'tbl_transaction';
    protected $guarded = [];

    public function ticket()
    {
    	return $this->belongsTo(Ticket::class,'ticket_id');
    }
}
