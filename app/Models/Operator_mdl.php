<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator_mdl extends Model
{
    protected $table 		= 'operators';
    protected $primarykey 	= 'operator_id';
    protected $fillable 	= ['operator_name,operator_email,operator_phone,operator_address,operator_logo,operator_status,operator_created_at,operator_updated_at'];
}
