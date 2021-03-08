<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Mypage\Profile\EditRequest;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function showProfileEditForm()
    {
    	return view('mypage.profile_edit_form')
    		->with('user', Auth::user());
    }

    public function editProfile(EditRequest $request)
    {
    	$user =  Auth::user();

    	$user->name = $request->input('name');

    	if ($request->has('avatar')) {
     //        $fileName = $this->saveAvatar($request->file('melpit'));
     //        $user->avatar_file_name = $fileName;
            // $file = $request->file('avatar');
            // $resize_img = Image::make($file)->resize(200, 200);
            // $path = $request->file->store('avatar', 's3');
            // Storage::disk('s3')->setVisibility($path, 'public')->putFile('/avatar/', (string)$resize_img, 'public');
            // $url = Storage::disk('s3')->url($path);

            $file = $request->file('avatar');
            // 画像の拡張子を取得
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // 画像の名前を取得
            $filename = $request->file('avatar')->getClientOriginalName();
            // 画像をリサイズ
            $resize_img = Image::make($file)->resize(200, 200)->encode($extension);
            // s3のuploadsファイルに追加
            $path = Storage::disk('s3')->put('/avatar/'.$filename,(string)$resize_img, 'public');
            // 画像のURLを参照
            $url = Storage::disk('s3')->url('avatar/'.$filename);

            $user->avatar_file_name = $url;
            $user->save();
        }

     //    $file = $request->file('file');
     //    $path = Storage::disk('s3')->putFile('/', $file, 'public');

    	// $user->save();



    	return redirect()->back()
    		->with('status', 'プロフィールを変更しました。');
    }

    /**
    * アバター画像をリサイズして保存します
    *
    * @param UploadedFile $file アップロードされたアバター画像
    * @return string ファイル名
    */
    private function saveAvatar(UploadedFile $file): string
		{
			// $tempPath = $this->makeTempPath();

			Image::make($file)->fit(200, 200)->save();

			$filePath = Storage::disk('s3')
			 ->putFile('/melpit/', $file, 'public');

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
