<?php

namespace App\Http\Controllers;
use App\Models\UploadImage;
use Illuminate\Http\Request;

class ImageListController extends Controller
{
    
        $uploads = UploadImage::orderBy("id","desc")->get();

        return view("image_list",[
            "images" => $uploads
        ]); 
}
