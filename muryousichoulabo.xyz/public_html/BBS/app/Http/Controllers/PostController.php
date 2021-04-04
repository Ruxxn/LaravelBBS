<?php

namespace App\Http\Controllers;

use App\UploadImage;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$posts = Post::all();
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        
	//インスタンス作成
	$post = new Post();

	$post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $id;

        $post->save();

	        //echo('uploade関数が実行されました');
                $request->validate([
                        'image' => 'required|file|image|mimes:png,jpeg'
                ]);
                $upload_image = $request->file('image');

                if($upload_image)
                {
                        //アップロードされた画像を保存する
                        $path = $upload_image->store('uploads',"public");
                        //画像の保存に成功したらDBに記録する
                        if($path)
                        {
                                UploadImage::create([
                                        "file_name" => $upload_image->getClientOriginalName(),
                                        "file_path" => $path
                                ]);
                        }
                }

        return redirect()->to('/posts');
    }

	public function showImage(){
		return view("upload_form");
	}

	    public function upload(Request $request)
	    {
		//echo('uploade関数が実行されました');
		
		$request->validate([
			'image' => 'required|file|image|mimes:png,jpeg'
		]);
		$upload_image = $request->file('image');
	
		if($upload_image)
		{
			//アップロードされた画像を保存する
			$path = $upload_image->store('uploads',"public");
			//画像の保存に成功したらDBに記録する
			if($path)
			{
				UploadImage::create([
					"file_name" => $upload_image->getClientOriginalName(),
					"file_path" => $path
				]);
			}
		}
		return redirect()->to('/posts');		
	    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $usr_id = $post->user_id;
        $user = DB::table('users')->where('id',$usr_id)->first();

        return view('posts.detail',['post' => $post,'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit',['post' => $post,'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
	$id = $request->post_id;
	
        //レコードを検索
        $post = Post::findOrFail($id);
        $post->body = $request->body;
       
	 //保存
        $post->save();
        return redirect()->to('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        return redirect()->to('/posts');
    }
}
