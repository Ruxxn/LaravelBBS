

<a href="{{ route('upload_form') }}">Upload画面へ戻る</a>
<hr />

@foreach($images as $image)
<div style="width: 18rem; float:left; margin: 16px;">
	<img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
<?php
	$a = Storage::url($image->file_path);
	echo($a);
?>
	<p>{{ $image->file_name }}</p>
</div>
@endforeach


