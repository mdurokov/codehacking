@extends('layouts.admin')

@section('content')

	<h1>Media</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Image</th>
				<th>Created</th>
				<th>Updated</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		@if($photos)
			@foreach($photos as $photo)
				<tr>
					<td>{{ $photo->id }}</td>
					<td>{{ $photo->file }}</td>
					<td><img height="50" src="{{ $photo->file ? $photo->file : '/images/placeholder.png' }}"></td>
					<td>{{ $photo->created_at->diffForHumans() }}</td>
					<td>{{ $photo->updated_at->diffForHumans() }}</td>
					<td>
						{!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediasController@destroy', $photo->id]]) !!}
						
							<div class="form-group">
								{!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
							</div>
						
						{!! Form::close() !!}
						
					</td>
				</tr>
			@endforeach
		@endif
		</tbody>
	</table>

@stop