<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Like;
use App\Models\User;
use App\Models\Cart;
use App\Models\PrimaryCategory;
use App\Models\SecondaryCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Payjp\Charge;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $ladiesCategory = PrimaryCategory::where('id', 1)->first();
        $ladiesChildCategoryIds = $ladiesCategory->secondaryCategories->pluck('id');
        $ladiesitems = Item::whereIn('secondary_category_id', $ladiesChildCategoryIds)->where('state', 'selling')->inRandomOrder()->take(8)->get();

        $mensCategory = PrimaryCategory::where('id', 2)->first();
        $mensChildCategoryIds = $mensCategory->secondaryCategories->pluck('id');
        $mensitems = Item::whereIn('secondary_category_id', $mensChildCategoryIds)->where('state', 'selling')->inRandomOrder()->take(8)->get();

        $toiesCategory = PrimaryCategory::where('id', 6)->first();
        $toiesChildCategoryIds = $toiesCategory->secondaryCategories->pluck('id');
        $toiesitems = Item::whereIn('secondary_category_id', $toiesChildCategoryIds)->where('state', 'selling')->inRandomOrder()->take(8)->get();

        $appliancesCategory = PrimaryCategory::where('id', 8)->first();
        $appliancesChildCategoryIds = $appliancesCategory->secondaryCategories->pluck('id');
        $appliancesitems = Item::whereIn('secondary_category_id', $appliancesChildCategoryIds)->where('state', 'selling')->inRandomOrder()->take(8)->get();

        $like_model = new Like;

        $data = [
            'ladiesitems' => $ladiesitems,
            'mensitems' => $mensitems,
            'toiesitems' => $toiesitems,
            'appliancesitems' => $appliancesitems,
            'like_model' => $like_model,
        ];

    	return view('items.items2', $data);
    }

    public function search(Request $request)
    {
        $query = Item::query();

        if ($request->filled('category')) {
            list($categoryType, $categoryID) = explode(':', $request->input('category'));

            if ($categoryType === 'primary') {
                $query->whereHas('secondaryCategory', function ($query) use ($categoryID) {
                    $query->where('primary_category_id', $categoryID);
                });
            } else if ($categoryType === 'secondary') {
                $query->where('secondary_category_id', $categoryID);
            }
        }

        if ($request->filled('keyword')) {
            $keyword = '%' . $this->escape($request->input('keyword')) . '%';
             $query->where(function ($query) use ($keyword) {
                 $query->where('name', 'LIKE', $keyword);
                 $query->orWhere('description', 'LIKE', $keyword);
             });
        } 

        $item = $items = $query->first();
        $items = $query->where('state', 'selling')->orderBy('created_at', 'DESC')->paginate(52);
        $like_model = new Like;

        $data = [
            'item' => $item,
            'items' => $items,
            'like_model' => $like_model,
        ];

        return view('items.items', $data);
    }

    public function escape(string $value)
    {
        return str_replace(
            ['\\', '%', '_'],
            ['\\\\', '\\%', '\\_'],
            $value
        );
    }

    public function showItemDetail(Item $item)
    {
        $user = Auth::user();
        $cartitem = Cart::with('items')->where('item_id', $item->id)->first();
        // dd($cartitem);

        $data = [
            'cartitem' => $cartitem,
            'item' => $item,
            'user' => $user,
        ];

    	return view('items.item_detail', $data);
    }

    public function showBuyItemForm(Item $item)
    {
        if (!$item->isStateSelling) {
            abort(404);
        }

        $cartitems = Item::select('items.*')
            ->with("secondaryCategory.primaryCategory")
            ->where('user_id', Auth::id())
            ->join('cart_items', 'cart_items.item_id', '=', 'items.id')
            ->get();

        $subtotal = 0;
        foreach ($cartitems as $cartitem) {
            $subtotal += $cartitem->price;
        }

        return view('items.item_buy_form')
            ->with('cartitems', $cartitems)
            ->with('subtotal', $subtotal);
    }

    public function buyItem(Request $request, Item $item)
    {
        $user  = Auth::user();

        if (!$item->isStateSelling) {
            abort(404);
        }

        $token = $request->input('card-token');

        try {
            $this->settlement($item->id, $item->seller->id, $user->id, $token);
            Cart::where('user_id', Auth::id())->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', '????????????????????????????????????');
        }

        return redirect()->route('item', [$item->id])
                ->with('message', '??????????????????????????????');
    }

    private function settlement($itemID, $sellerID, $buyerID, $token)
    {
        DB::beginTransaction();

        try {
            $seller = User::lockForUpdate()->find($sellerID);
            $item   = Item::lockForUpdate()->find($itemID);

            if ($item->isStateBought) {
                throw new \Exception('????????????');
            }

            $cartitems = Item::select('items.*')
                ->with("secondaryCategory.primaryCategory")
                ->where('user_id', Auth::id())
                ->join('cart_items', 'cart_items.item_id', '=', 'items.id')
                ->get();

            $subtotal = 0;
            foreach ($cartitems as $cartitem) {
                $subtotal += $cartitem->price;
            }

            foreach ($cartitems as $item) {
                $item->state     = Item::STATE_BOUGHT;
                $item->bought_at = Carbon::now();
                $item->buyer_id  = $buyerID;
                $item->save();
            }

            $seller->sales += $subtotal;
            $seller->save();

            $charge = Charge::create([
                'card'     => $token,
                'amount'   => $subtotal,
                'currency' => 'jpy'
            ]);
            if (!$charge->captured) {
                throw new \Exception('?????????????????????');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();
    }

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $item_id = $request->item_id;
        $like = new Like;
        $item = Item::findOrFail($item_id);
        

        // ???????????????????????????????????????????????????
        if ($like->like_exist($id, $item_id)) {
            Log::debug(11111);
            //likes????????????????????????????????????
            $like = Like::where('item_id', $item_id)->where('user_id', $id)->delete();
        } else {
            Log::debug(22222);
            //???????????????????????????????????????????????????likes???????????????????????????????????????????????????
            $like = new Like;
            $like->item_id = $request->item_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        $itemLikesCount = $item->loadCount('likes')->likes_count;

        //??????????????????ajax???????????????????????????
        //?????????????????????????????????????????????????????????????????????????????????
        $json = [
            'itemLikesCount' => $itemLikesCount,
        ];
        //??????????????????ajax????????????????????????
        return response()->json($json);
    }
}
