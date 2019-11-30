 @extends('layouts.app')

@section('content')     
<div class="container-fluid">
	<div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Faktur</h3>
                <ul class="panel-controls" style="margin-top: 2px;">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                    <ul class="dropdown-menu">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                    </ul>                                        
                </li>                                        
            </ul>    
            </div>

            <div class="panel-body">
              <div class="row">
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>id pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                	@php($no = 1)
                	@foreach($tampil as $t)
                	<tr>
                		<td>{{$no++}}</td>
                		<td>{{$t->id_pesanan}}</td>
                		<td>{{$t->nama_pelanggan}}</td>
                		<td>
                			@php($cek= DB::table('pesanan_models')->where('id_pesanan',$t->id_pesanan)->first())
                			@php($cm = DB::table('menu_models')->where('id_menu',$cek->id_menu)->first())
                			{{$cm->nama_menu}}
                		</td>
                		<td>{{$cek->harga}}</td>
                		<td>{{$cek->jumlah}}</td>
                		<td>{{$t->total}}</td>
                		<td>{{$t->bayar}}</td>
                		<td>{{$t->kembalian}}</td>
                		<td>
                			<a href="{{url('/home/cetak/faktur/'.$t->id_pesanan)}}" class="btn btn-info">Print</a>
                		</td>
                	</tr>
                	@endforeach
               
                </tbody>
              </table>
            </div>
        </div>
 
</div>
@endsection     