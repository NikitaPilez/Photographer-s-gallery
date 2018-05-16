<select name="type" id="typeOrder" class="field-model form-control">
	@foreach($services as $service)
	<option {{($service->id==$idServices)?'selected':''}}> 
		@if(App::getLocale() == 'en')
		{{$service->name}}
		@else
		{{$service->nameRus}}
		@endif
	 </option>
	@endforeach
</select>