@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_photo'))
	<p class="bg-danger">{{ session('deleted_photo') }}</p>
@endif

	<h1>Media</h1>

	<table class="table">
		<thead>
			<tr>
				<th><input type="checkbox" id="options"></th>
				<th>Id</th>
				<th>Name</th>
				<th>Image</th>
				<th>Created</th>
				<th>Updated</th>
				{{-- <th>Delete</th> --}}
			</tr>
		</thead>
		<tbody>
		@if($photos)

			<form action="delete/media" method="post">
				
				{{ csrf_field() }}
				{{ method_field('delete') }}

			@foreach($photos as $photo)
				<tr>
					<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
					<td>{{ $photo->id }}</td>
					<td>{{ $photo->file }}</td>
					<td><img height="50" src="{{ $photo->file ? $photo->file : '/images/placeholder.png' }}"></td>
					<td>{{ $photo->created_at->diffForHumans() }}</td>
					<td>{{ $photo->updated_at->diffForHumans() }}</td>
					{{-- <td>
							<input type="hidden" name="photo" value="{{ $photo->id }}">
							<div class="form-group">
								<input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
							</div>
						
					</td> --}}
				</tr>
			@endforeach
		@endif
		</tbody>
	</table>
	<div class="row">
					<div class="form-group col-sm-2">
						<select class="form-control">
							<option value=""> DELETE </option>
						</select>
					</div>
					<div class="form-group col-sm-2">
						<input class="btn btn-danger" type="submit" name="delete_multiple" value="Delete Checked">
					</div>
				</div>
	</form>
	<div class="col-sm-6 col-sm-offset-5">
		{{ $photos->render() }}
	</div>
@stop
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#options').click(function(){
			if(this.checked){
				$('.checkBoxes').each(function(){
					this.checked = true;
				});
			}else{
				$('.checkBoxes').each(function(){
					this.checked = false;
				});
			}
		});
	})
</script>
@stop