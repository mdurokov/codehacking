@extends('layouts.admin')

@section('content')

<h1>Users</h1>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Photo</th>
			<th>Role</th>
			<th>Name</th>
			<th>Email</th>
			<th>Created</th>
			<th>Updated</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@if($users)
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td><img height="50" src="{{ $user->photo ? $user->photo->file : "/images/placeholder.png" }}"></td>
					<td>{{ $user->role->name }}</td>
					<td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at->diffForHumans() }}</td>
					<td>{{ $user->updated_at->diffForHumans() }}</td>
					<td>{{ $user->is_active == 1 ? "Active" : "NOT Active" }}</td>
				</tr>
			@endforeach
		@endif

	</tbody>
</table>


@stop