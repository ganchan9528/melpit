<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id', 'items_id',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function item()
    {
      return $this->belongsTo(Item::class);
    }

    public function like_exist($id, $item_id)
    {
		$exist = Like::where('user_id', '=', $id)->where('item_id', '=', $item_id)->get();

	    if (!$exist->isEmpty()) {
	        return true;
	    } else {
	        return false;
	    }
	}
}
