@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if($status == 'menu')
    @include('pages.admin.include.menu')
    @elseif($status == 'reviewmenu')
    @include('pages.admin.include.reviewmenu')  
    @endif
</div>
@endsection
