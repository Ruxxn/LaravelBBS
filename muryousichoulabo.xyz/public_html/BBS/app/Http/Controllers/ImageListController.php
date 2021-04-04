<?php

namespace App\Http\Controllers;
use App\UploadImage;
use Illuminate\Http\Request;

class ImageListController extends Controller
{
    function showList()
    {
        //アップロードした画像を取得
	$uploads = UploadImage::orderBy("id", "desc")->get();

	return view("image_list",[
	      "images" => $uploads
        ]);
    }

    function show()
    {
	//UploadImageモデルに連携されているupload_imageテーブルの内容を全て取得
	$upload = UploadImage::select(1,"file_path")->get();
	echo("upload is .".$upload."です");	
	return view("/posts/detail/{id}",[
		"image" => $upload
	]);
    }    

}
