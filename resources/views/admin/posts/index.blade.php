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
				<th>Image</th>
				<th>Title</th>
				<th>Category</th>
				<th>Author</th>
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
					<td><img height="50" src="{{ $post->photo ? $post->photo->file : "/images/placeholder.png" }}"></td>
					<td><a href="{{ route('admin.posts.edit', $post->id) }} ">{{ $post->title }}</a></td>
					<td>{{ $post->category ? $post->category->name : 'No Category' }}</td>
					<td>{{ $post->user->name }}</td>
					<td><a href="{{ route('admin.comments.show', $post->id) }}">View Comments</a></td>
					<td>{{ $post->created_at->diffForHumans() }}</td>
					<td>{{ $post->updated_at->diffForHumans() }}</td>
					<td><a href="{{ route('home.post', $post->slug) }}">View Post</a></td>
				</tr>
			@endforeach
		@endif
		</tbody>
	</table>

	<div class="row">
		<div class="col-sm-6 col-sm-offset-5">
			{{ $posts->render() }}
		</div>
	</div>




@stop