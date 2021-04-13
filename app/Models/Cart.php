<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $fillable = [
        'user_id', 'items_id',
    ];

    protected $table = 'cart_items';

    public function items() {
    	return $this->hasMany(Item::class, 'seller_id');
    }
}
