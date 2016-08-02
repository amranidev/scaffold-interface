@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
<div class="box box-primary">
<div class="box-header">
	<h3>All Users</h3>
</div>
	<div class="box-body">
		<a href="{{url('/users/create')}}" class = "btn btn-success">create new user</a>
		<table class = "table table-hover">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>
					<a href="{{url('/users/edit')}}/{{$user->id}}" class = 'btn btn-primary'>Edit</a>
					<a href="{{url('/users/addRole')}}" class = 'btn btn-success'>add role</a>
					<a href="{{url('/users/addPermession')}}" class = 'btn btn-warning'>add permession</a>
					<a href="{{url('users/delete')}}/{{$user->id}}" class = "btn btn-danger">delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
</section>
@endsection