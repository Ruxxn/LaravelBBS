<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class UploadImage extends Model
{
    //hasFactoryは該当のカラムにテストデータを入れるらしい(?)
    //use HasFactory;
    //モデルをupload_imageテーブルと連携させる
    protected $table = "upload_image";
    protected $fillable = ["file_name","file_path","file_size"];
}
