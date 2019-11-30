@extends('layouts.app')

@section('content')
	<div class="contariner-fluid">
		<div class="row">
			<div class="col-md-4">
				 <div class="panel panel-default">
				    <div class="panel-heading">
				        <h3 class="panel-title">Form Edit User</h3>
				    </div>
				    <div class="panel-body">
				<form action="{{ url('home/edit/user/root/'. auth()->user()->id_user)}}" method="post">
					@csrf @method('put')
				<p>Name</p>
				<input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
				<p>Email</p>
				<input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
				<p>Password</p>
				<input type="password" name="password" class="form-control" placeholder="Password">
				<br>
				<input type="submit" class="btn btn-info" value="update">
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
@endsection