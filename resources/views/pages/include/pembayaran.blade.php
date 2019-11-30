
 <div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Pembayaran</h3>
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
        <th>id Pesanan</th>
        <th>No Meja</th>
        <th>Nama Pelanggan</th>
        <th>Menu</th>
        <th>Harga</th>
        <th>Jml Pesana</th>
        <th>Total</th>
        <th>Status</th>
        <th>order</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @php($no = 1)
    @foreach($tampil as $t)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $t->id_pesanan}}</td>
        <td>{{$t->no_meja}}</td>
        <td>{{$t->nama_pelanggan}}</td>
        <td>
            @php($cekmenu = DB::table('menu_models')->where('id_menu',$t->id_menu)->first())
            {{$cekmenu->nama_menu}}
        </td>
        <td>{{$t->harga}}</td>
        <td>{{$t->jumlah}}</td>
        <td>{{$t->total}}</td>
        <td>
            @if($t->status == '0')
            proses
            @elseif($t->status == '1')
            batal
            @endif
        </td>
        <td> @php($cekorder = DB::table('users')->where('id_user',$t->id_user)->first())
            {{$cekorder->name}}</td>
        <td>
            <form method="post" action="{{url('home/pesanan/delete/'.$t->id)}}" >
                @csrf @method('delete')
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{ $t->id}}">Bayar</button>
            </form>
                       <div class="modal fade" id="myModal{{ $t->id}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Pembayaran</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
                <!-- Modal body -->
                <div class="modal-body">
                 <div class="container-fluid">
                        <form action="{{url('/home/pages/bayar/pesanan/')}}" method="post" enctype="multipart/form-data">
                            @csrf 
                          <p>No Meja</p>
                         <p>
                            <input type="text" name="no_meja" class="form-control" value="{{$t->no_meja}}">
                         </p>  
                         <p>Nama Pelanggan</p>
                         <p>
                         	<input type="hidden" name="id" value="{{$t->id}}">
                         	<input type="hidden" name="id_user" value="{{$t->id_user}}">
                         	<input type="hidden" name="id_pesanan" value="{{$t->id_pesanan}}">
                            <input type="text" name="nama_pelanggan" class="form-control" value="{{$t->nama_pelanggan}}">
                         </p> 
                         <p>Total Harga</p>
                         <p>
                            <input type="text" name="total" class="form-control" id="txtharga{{$t->id}}" value="{{$t->total}}">
                         </p>
                          <p>Bayar</p>
                         <p>
                            		<input type="text" name="bayar" class="form-control" id="txtbayar{{$t->id}}">                     
                         </p>
                      

                          <p>
                            <input type="submit"  class="btn btn-default" value="submit">
                         </p>    
                        </form>
                   
                 </div>
                </div>
          
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
          
              </div>
            </div>
          </div>
        </td>
    </tr>
 
    @endforeach
    </tbody>
  </table>
</div>
