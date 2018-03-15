@extends('layouts.admin')

@section('content')

@if(Session::has('created_post'))
	<p class="bg-success">{{ session('created_post') }}</p>
@endif
@if(Session::has('updated_post'))
	<p class="bg-success">{{ session('updated_post') }}</p>
@endif
@if(Session::has('deleted_post'))
	<p class="bg-danger">{{ session('deleted_post') }}</p>
@endif

	<h1>Posts</h1>

	<table class="table">

		<thead>
			<tr>
				<th>Post</th>
				<th>Author</th>
				<th>Category</th>
				<th>Title</th>
				<th>Body</th>
				<th>Image</th>
				<th>Comments</th>
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
					<td>{{ str_limit($post->body, 30) }}</td>
					<td><img height="50" src="{{ $post->photo ? $post->photo->file : "/images/placeholder.png" }}"></td>
					<td><a href="{{ route('admin.comments.show', $post->id) }}">View Comments</a></td>
					<td>{{ $post->created_at->diffForHumans() }}</td>
					<td>{{ $post->updated_at->diffForHumans() }}</td>
					<td><a href="{{ route('admin.posts.edit', $post->id) }} ">Edit Post</a></td>
					<td><a href="{{ route('home.post', $post->id) }}">View Post</a></td>
				</tr>
			@endforeach
		@endif
		</tbody>
	</table>





@stop