@extends('layouts.app')

@section('content')
<div class="container-fluid">
	@if($kondisi == 'pesanan')
	@include('pages.include.pesanan')
	@elseif($kondisi =='reviewpesanan')
	@include('pages.include.reviewpesanan')
	@elseif($kondisi =='pembayaran')
	@include('pages.include.pembayaran')
	@endif
</div>
@endsection