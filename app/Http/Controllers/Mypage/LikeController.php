<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Like;
use App\Models\Item;
use App\Models\User;

class LikeController extends Controller
{
    public function showLikeItems(Request $request) 
    {
        $items = Like::select('likes.*', 'items.name', 'items.image_file_name', 'items.price', 'items.state', 'items.bought_at')
        	->where('user_id', Auth::id())
        	->join('items', 'items.id', '=', 'likes.item_id')
        	->get();

        return view('mypage.likes')
            ->with('items', $items);
    }
}
