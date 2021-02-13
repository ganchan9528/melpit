<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    public function addCartInItems()
    {
        return $this->hasMany(Item::class, 'seller_id');
    }
}
