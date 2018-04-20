<?php

namespace App;

use App\Buyer;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //
   	use SoftDeletes;

   	protected $table = 'transactions';

   	protected $fillable = [
   		'quantity','buyer_id','product_id'
   	];

   	protected $dates = ['deleted_at'];

   	public function buyers()
   	{
   		return $this->belongsTo(Buyer::class);
   	}

   	public function products()
   	{
   		return $this->belongsTo(Product::class);
   	}
}
