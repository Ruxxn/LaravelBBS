<?php

namespace App\Http\Controllers;
use App\UploadImage;
use Illuminate\Http\Request;

class ImageListController extends Controller
{
    function show()
    {
        $uploads = UploadImage::orderBy("id","desc")->get();

        return view("image_list",[
            "images" => $uploads
        ]);
    }    

}
