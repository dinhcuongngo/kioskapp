<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
    	'name', 'description', 'photo', 'seller_id'
    ];

    protected $dates = ['deleted_at'];

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function sellers()
    {
    	return $this->belongsTo(Seller::class);
    }

    public function transaction()
    {
    	return $this->hasMany(Transaction::class);
    }
}
