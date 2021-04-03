<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    //本来はアップローダーは新規投稿の中
    function show()
    {
 	return view('upload_form');
    }

    function upload(Request $request)
    {
      
    }
}
