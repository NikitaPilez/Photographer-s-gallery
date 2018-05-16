@extends('base')
@section('content')

<div class="container-models container">

	<div class="row">
		@foreach($models as $model)
		<div class="col-md-4 mask col-models-3">
			<a href="{{asset('uploads/'.$model->photo)}}" data-lightbox="roadtrip">
				<img class="img-fluid" src="{{asset('uploads/'.$model->photo)}}"  alt="">
			</a>
		</div>
		@endforeach
	</div>

	<div class="pagination-center-models">
		{{$models->links()}}
	</div>
<!-- 	<div class="center">
		<a data-toggle="modal" data-target="#becomemodel" class="btn btn-default btn-xs btn-model margin-btn-services btn-anim">
			become a model
		</a>
	</div> -->

</div>

<footer>
	<div class="container text-center">
		<p>Copyright &copy; {{$settings->copyright}}</p>
	</div>
</footer>

<div id="becomemodel" class="modal fade">
	<div class="modal-dialog">
		<div class="black-modal">
			<div class="modal-body">
				<button class="close" type="button" data-dismiss="modal">×
				</button>
				<form action="{{asset('sendmodel')}}" method="get">
					{!! csrf_field(); !!}
					<div class="form-group">
						<div class="form-group">
							<h5 class="label-color">Name*
								<input type="numeric" name="name" id="nameModel" class=" field-model form-control" required placeholder="Enter name">
								<small>
									<span class="help-block margin-help-block">
										<strong class="help-name"></strong>
									</span>
								</small>
							</h5>

						</div>
						<h5 class="label-color">Email address
							<input type="email" name="email" class="field-model form-control" aria-describedby="emailHelp" placeholder="Enter email">
						</h5>
					</div>
					<div class="form-group">
						<h5 class="label-color">Phone*
							<input type="numeric" name="phone" id="phoneModel" required class=" field-model form-control" placeholder="Phone">
							<small>
								<span class="help-block margin-help-block">
									<strong class="help-phone"></strong>
								</span>
							</small>
						</h5>
					</div>
					<div class="form-group">
						<h5 class="label-color">Attach your three best photos
							<small>
<!-- 								<div class="input_file">
									<input type="file" name="" >
									<div class="fake_file"><input type="text" class="fake_file_input"> 
										<input type="button" value="Select"></div>
										<a href="#" class="clear_input">Clear</a>
									</div> -->


									<!-- <div>
										<input type="file" name="file" id="file" class="inputfile" />
										<label for="file">select photo</label>

									</div>
									<input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple /> -->

									<input type="file" name="firstphoto" class="field-model form-control-file label-color">
									<input type="file" name="secondphoto" class="field-model form-control-file label-color">
									<input type="file" name="thirdphoto" class="field-model form-control-file label-color">
								</small>
							</h5>
						</div>
						<div class="center">
							<!-- 							<button type="submit" class="btn btn-default">Send</button> -->
							<a id="sendModel" class="btn btn-default btn-xs btn-model margin-btn-services btn-anim">
								Send
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> 

	@endsection

