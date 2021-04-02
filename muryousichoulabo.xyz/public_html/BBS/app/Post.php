<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //DBの使うテーブルを指定
    protected $table = 'posts';
}
