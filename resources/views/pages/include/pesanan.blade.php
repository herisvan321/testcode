<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">form Pesanan</h3>
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
        <th>Nama Menu</th>
        <th>Type Menu</th>
        <th>Status Menu</th>
        <th>Foto Menu</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @php($no = 1)
    @foreach($tampil as $t)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$t->nama_menu}}</td>
        <td>
            @if($t->type == '0')
            Makanan
            @else
            Minuman
            @endif
        </td>
        <td> 
            @if($t->status == '0')
            Ready
            @else
            Non Ready
            @endif
        </td>
        <td><img src="{{ asset('/upload/fotomenu/'.$t->foto_menu)}}" style="width:150px;height:150px;" alt="img"></td>
        <td>
           @if($t->status == '0')
            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal{{ $t->id_menu}}">Pesan</button>
            @else
             <button type="button" class="btn btn-danger disabled"   >Pesan</button>
            @endif
               
              

            <div class="modal fade" id="myModal{{ $t->id_menu}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Edit Menu</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
                <!-- Modal body -->
                <div class="modal-body">
                 <div class="container-fluid">
                        <form action="{{url('/home/pages/save/pesanan/')}}" method="post" enctype="multipart/form-data">
                            @csrf 
                          <p>No Meja</p>
                         <p>
                         	<input type="text" name="no_meja" class="form-control" placeholder="input no meja">
                         </p>  
                         <p>Nama Pelanggan</p>
                         <p>
                         	<input type="text" name="nama_pelanggan" class="form-control" placeholder="input nama pelanggan">
                         </p> 
                         <p>Menu yang dipilih</p>
                         <p>
                         	<input type="text" value="{{$t->nama_menu}}" disabled class="form-control">
                         </p>
                         <p>Harga</p>
                         <p>
                         	<input type="text" value="{{$t->harga}}" disabled class="form-control">
                         </p>
                         <input type="hidden" value="{{$t->harga}}" name="harga"  class="form-control">
                         <input type="hidden" name="id_user" value="{{ auth()->user()->id_user}}">
                         <input type="hidden" name="id_menu" value="{{ $t->id_menu}}">
                         <p>Jumlah</p>
                         <p>
                         	<input type="text" name="jumlah" class="form-control">
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