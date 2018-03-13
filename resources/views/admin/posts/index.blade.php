@extends('layouts.admin')

@section('content')

	<h1>Posts</h1>

	<table class="table">

		<thead>
			<tr>
				<th>Post</th>
				<th>Author</th>
				<th>Category</th>
				<th>Title</th>
				<th>Post</th>
				<th>Image</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
		@if($posts)
			@foreach($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->user->name }}</td>
					<td>{{ $post->category ? $post->category->name : 'No Category' }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->body }}</td>
					<td><img height="50" src="{{ $post->photo ? $post->photo->file : "/images/placeholder.png" }}"></td>
					<td>{{ $post->created_at->diffForHumans() }}</td>
					<td>{{ $post->updated_at->diffForHumans() }}</td>
				</tr>
			@endforeach
		@endif
		</tbody>
	</table>





@stop