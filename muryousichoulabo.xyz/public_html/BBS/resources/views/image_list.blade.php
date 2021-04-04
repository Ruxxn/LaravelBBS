
<a href="{{ route('upload_form') }}">Upload画面へ戻る</a>
<a href="https://muryousichoulabo.xyz/BBS/public/posts/">掲示板へ戻る</a>
<hr />

@foreach($images as $image)
<div style="width: 18rem; float:left; margin: 16px;">
        <img src="/BBS/public/{{ Storage::url($image->file_path) }}" style="width:100%;"/>
        
<?php   
        $a = Storage::url($image->file_path);
        echo($a);
?>
        <p>{{ $image->file_name }}</p>
</div>
@endforeach
