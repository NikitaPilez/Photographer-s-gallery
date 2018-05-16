@foreach($obj as $one)
<div>
	<a href="{{asset('uploads/'.$one->photo)}}" data-lightbox="tmp">
		<img class="img-fluid" src="{{asset('uploads/'.$one->photo)}}"  alt="">
	</a>
</div>
@endforeach