<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Item;

class CartItemController extends Controller
{
    public function index()
    {
        $cartitems = Item::select('items.*')
            ->with("secondaryCategory.primaryCategory")
            ->where('user_id', Auth::id())
            ->join('cart_items', 'cart_items.item_id', '=', 'items.id')
            ->get();

        $subtotal = 0;
        foreach ($cartitems as $cartitem) {
            $subtotal += $cartitem->price;
        }

        return view('mypage.cart', ['cartitems' => $cartitems, 'subtotal' => $subtotal]);
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $item_id = $request->item_id;
        $cartitem = new Cart;
        $item = Item::findOrFail($item_id);
        $cartitem->item_id = $request->item_id;
        $cartitem->user_id = Auth::user()->id;
        $cartitem->save();

        return redirect('/')->with('flash_message', 'カートに追加しました');
    }

    public function destroy(Item $item)
    {
        $item = Cart::where('item_id', $item->id)->delete();
        return redirect('mypage/cart-items')->with('flash_message', 'カートから削除しました');
    }
}
