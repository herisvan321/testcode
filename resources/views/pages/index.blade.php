@extends('layouts.app')

@section('content')
<div class="contiiner-fluid">
	<h1>Selamat datang {{auth()->user()->name}}</h1>
	<h3>Status
		@php($status = auth()->user()->status)
		@if($status == '0')
		<u>Admin</u>
		@elseif($status == '1')
		<u>Kasir</u>
		@else
		<u>Pelayan</u>
		@endif
	</h3>
</div>
@endsection
