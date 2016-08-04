@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Edit User ({{$user->name}})</h3>
		</div>
		<div class="box-body">
			<form action="{{url('users/update')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "user_id" value = "{{$user->id}}">
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name = "email" value = "{{$user->email}}" class = "form-control">
				</div>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name = "name" value = "{{$user->name}}" class = "form-control">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name = "password" class = "form-control" placeholder = "password">
				</div>
				<button class = "btn btn-primary" type="submit">Update</button>
			</form>
		</div>
	</div>
</section>
@endsection
