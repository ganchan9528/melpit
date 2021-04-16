<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellRequest;
use App\Models\Item;
use App\Models\ItemCondition;
use App\Models\PrimaryCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class SellController extends Controller
{
    public function index()
    {
    	$categories = PrimaryCategory::query()
    		->with([
    			'secondaryCategories' => function ($query) {
    				$query->orderBy('sort_no');
    			}
    		]) 
    		->orderBy('sort_no')
    		->get();
    	$conditions = ItemCondition::orderBy('sort_no')->get();

    	return view('sell.index')
    		->with('categories', $categories)
    		->with('conditions', $conditions);
    }

    public function store(SellRequest $request)
    {
    	$user = Auth::user();

    	$imageName = $this->saveImage($request->file('item-image'));

        // heroku環境
        // $file = $request->file('item-image');
        // $extension = $request->file('item-image')->getClientOriginalExtension();
        // $filename = $request->file('item-image')->getClientOriginalName();
        // $resize_img = Image::make($file)->resize(300, 300)->encode($extension);
        // $path = Storage::disk('s3')->put('/item-image/'.$filename,(string)$resize_img, 'public');
        // $url = Storage::disk('s3')->url('item-image/'.$filename);
        // $user->avatar_file_name = $url;

    	$item = new Item();
    	$item->image_file_name = $imageName; // ローカル環境
     //    $item->image_file_name = $url;    // heroku環境
    	$item->seller_id = $user->id;
    	$item->name = $request->input('name');
    	$item->description = $request->input('description');
        $item->secondary_category_id = $request->input('category');
    	$item->item_condition_id = $request->input('condition');
    	$item->price = $request->input('price');
    	$item->state = Item::STATE_SELLING;
    	$item->save();

    	return redirect()->back()
    		->with('status', '商品を出品しました。');
    }

    public function edit(Item $item) 
    {
        $categories = PrimaryCategory::query()
            ->with([
                'secondaryCategories' => function ($query) {
                    $query->orderBy('sort_no');
                }
            ]) 
            ->orderBy('sort_no')
            ->get();
        $conditions = ItemCondition::orderBy('sort_no')->get();

        return view('sell.edit')
            ->with('item', $item)
            ->with('categories', $categories)
            ->with('conditions', $conditions);
    }

    public function update(SellRequest $request, Item $item)
    {
        $user = Auth::user();

        $imageName = $this->saveImage($request->file('item-image'));

        // heroku環境
        // $file = $request->file('item-image');
        // $extension = $request->file('item-image')->getClientOriginalExtension();
        // $filename = $request->file('item-image')->getClientOriginalName();
        // $resize_img = Image::make($file)->resize(300, 300)->encode($extension);
        // $path = Storage::disk('s3')->put('/item-image/'.$filename,(string)$resize_img, 'public');
        // $url = Storage::disk('s3')->url('item-image/'.$filename);
        // $user->avatar_file_name = $url;

        $item->image_file_name = $imageName; // ローカル環境
        // $item->image_file_name = $url;    // heroku環境
        $item->seller_id = $user->id;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->secondary_category_id = $request->input('category');
        $item->item_condition_id = $request->input('condition');
        $item->price = $request->input('price');
        $item->state = Item::STATE_SELLING;
        $item->save();

        return redirect()->back()
            ->with('status', '商品情報を変更しました。');
    }

    public function destroy(Request $request, Item $item)
    {
        $item->delete();
        return redirect('/')->with('status', '出品を取り消しました。');
    }

    /**
    * アバター画像をリサイズして保存します
    *
    * @param UploadedFile $file アップロードされたアバター画像
    * @return string ファイル名
    */
    private function saveImage(UploadedFile $file): string
		{
            // ローカル
			$tempPath = $this->makeTempPath();
            Image::make($file)->fit(250, 150)->save($tempPath);

			$filePath = Storage::disk('public')
			 ->putFile('item-images', new File($tempPath));

            // s3を使う場合(heroku)
            // Image::make($file)->fit(250, 150)->save();

            // $filePath = Storage::disk('s3')
            //  ->putFile('/melpit/', $file, 'public');

            // $file = $request->file('file');
            // $path = Storage::disk('s3')->putFile('/', $file, 'public');

			return basename($filePath);
		}

    /**
    * 一時的なファイルを生成してパスを返します
    *
    * @return string ファイルパス
    */
    private function makeTempPath(): string
	{
		$tmp_fp = tmpfile();
		$meta   = stream_get_meta_data($tmp_fp);
		return $meta["uri"];
	}
}
