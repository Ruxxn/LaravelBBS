@extends('layouts.app')
@section('title','create page')

@section('content')
<div class="row">
    <!-- メイン -->
    <div class = "col-10 col-md-6 offset-1 offset-md-3">
        <form action="/BBS/public/posts" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group">
		<label for="exampleFormControlTextarea1">タイトル</label>
	        <input type="text" class="form-control" name="title" id="exampleFormControlTextarea1">
		<br>
	        <label for="exampleFormControlTextarea2">内容</label>
	        <textarea class="form-control" name="body" id="exampleFormControlTextarea2" rows="3"></textarea>
                <div class="text-center mt-3">
<<<<<<< HEAD
		@csrf
		<input type="file" name="image" accept="image/png, image/jpeg">
=======

		<form
		        method="post"
		        action="{{ route('upload_image') }}"
       			 enctype="multipart/form-data"
		>
		        @csrf
		        <input type="file" name="image" accept="image/png, image/jpeg">
		        <input type="submit" value="Upload">
		</form>
>>>>>>> origin/master
		<br>
                    <input class="btn btn-primary" type="submit" value="投稿する">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
