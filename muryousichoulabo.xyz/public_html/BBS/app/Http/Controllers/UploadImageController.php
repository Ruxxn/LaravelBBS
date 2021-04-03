<?php

namespace App\Http\Controllers;
use App\Models\UploadImage;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    //本来はアップローダーは新規投稿の中
    function show()
    {
 	return view("upload_form");
	//return view('upload_form');
    }

    function upload(Request $request)
    {
      $request->validate(
      [
         'image' => 'required|file|image|mimes:png,jpeg'
      ]);
      
      //送られてきたfileのname='image'を情報を変数に格納
      $upload_image = $request->file('image');
      
      if($upload_image)
      {
        //アップロードされた画像を保存する
        $path = $upload_image->store('uploads',"public");
	echo('$path : '.$path.'です');
        if($path)
        {
	    //モデルを使いDBに格納
            UploadImage::create([
                "file_name" => $upload_image->getClientOriginalName(),
                "file_path" => $path
            ]);
        }

      }
      return redirect('/list');
            
    }
}
