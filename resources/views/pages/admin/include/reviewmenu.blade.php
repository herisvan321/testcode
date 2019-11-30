<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Review Menu</h3>
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
            <form action="{{url('/home/pages/menu/delete/'.$t->id_menu)}}" method="post" >
                @csrf @method('delete')
                <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal{{ $t->id_menu}}">EDIT</button>
                <input type="submit" value="DELETE" class="btn btn-danger">
            </form>

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
                        <form action="{{url('/home/pages/menu/update/'.$t->id_menu)}}" method="post" enctype="multipart/form-data">
                            @csrf  @method('put')
                                <p>Nama Menu</p>
                                <p>
                                    <input type="text" class="form-control" name="nama_menu" value="{{$t->nama_menu}}">
                                </p>
                                <p>Type</p>
                                <p>
                                    <select name="type" id="" class="form-control">
                                        <option value="{{$t->type}}">
                                             @if($t->type == '0')
                                            Makanan
                                            @else
                                            Minuman
                                            @endif</option>
                                        <option value="0">Makanan</option>
                                        <option value="1">Minuman</option>
                                    </select>
                                </p>
                                <p>Status</p>
                                <p>
                                <select name="status" id="" class="form-control">
                                        <option value="{{$t->status}}"> 
                                            @if($t->status == '0')
                                            Ready
                                            @else
                                            Non Ready
                                            @endif</option>
                                        <option value="0">Ready</option>
                                        <option value="1">No Ready</option>
                                </select> 
                                </p>
                                <p>
                                        <img src="{{ asset('/upload/fotomenu/'.$t->foto_menu)}}" style="width:150px;height:150px;" alt="img">
                                </p>
                                <p>Tukar Foto Menu</p>
                                <p>
                                    <input type="file" name="foto_menu" >
                                </p>
                                <p>
                                <input type="submit" value="Submit" class="btn btn-default">
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