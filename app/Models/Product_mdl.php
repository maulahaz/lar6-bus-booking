<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_mdl extends Model
{
    protected $table 		= 'tbl_products';
    protected $primarykey 	= 'uid';
    protected $fillable 	= [
		'parent_id',
		'user_id',
		'sku',
		'type',
		'name',
		'slug',
		'price',
		'weight',
		'length',
		'width',
		'height',
		'short_description',
		'description',
		'status',
    ];

    public function categories()
    {
    	return $this->belongsToMany('App\Models\Category_mdl', 'product_categories');
    }

    public static function status()
    {
    	return [
    		0 => 'draft',
    		1 => 'active',
    		2 => 'inactive'
    	];
    }

    public const DRAFT = 0;
	public const ACTIVE = 1;
	public const INACTIVE = 2;

	// public const STATUS = [
	// 	self::DRAFT => 'draft',
	// 	self::ACTIVE => 'active',
	// 	self::INACTIVE => 'inactive',
	// ];

	public const SIMPLE = 'simple';
	public const CONFIGURABLE = 'configurable';
	public const TYPES = [
		self::SIMPLE => 'Simple',
		self::CONFIGURABLE => 'Configurable',
	];
}
