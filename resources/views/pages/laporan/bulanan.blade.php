 @extends('layouts.app')

@section('content')     
<div class="container-fluid">
	<div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Laporan Bulanan</h3>
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
   
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Jumlah Transakasi</th>
                    <th>Jumlah</th>
                   
                  </tr>
                </thead>
                <tbody>
                		@php($no = 1)
                	@php($tmb = 0)
                	@foreach($tampil as $t)
                	<tr>
                		<td>{{$no++}}</td>
                		<td>{{$t->bulan}}</td>
                		<td>{{$t->transaksi}}</td>
                		<td>{{ $t->total}}</td>
                		@php($tmb += $t->total)
                	</tr>
                	@endforeach
               		<tr>
               			<th colspan="3">
               				<p align="right">Total :</p>
               			</th>
               			<th>
               				{{$tmb}}
               			</th>
               		</tr>
                </tbody>
              </table>
            </div>
        </div>
 
</div>
@endsection     