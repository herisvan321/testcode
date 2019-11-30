<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Input Menu</h3>
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
<div>
<form action="{{url('/home/pages/menu')}}" method="post" enctype="multipart/form-data">
@csrf
    <p>Nama Menu</p>
    <p>
        <input type="text" class="form-control" name="nama_menu" placeholder="Enter Nama Menu">
    </p>
    <p>Type</p>
    <p>
        <select name="type" id="" class="form-control">
            <option value="0">Makanan</option>
            <option value="1">Minuman</option>
        </select>
    </p>
    <p>Status</p>
    <p>
    <select name="status" id="" class="form-control" >
            <option value="0">Ready</option>
            <option value="1">No Ready</option>
    </select> 
    </p>
     <p>Harga</p>
    <p>
        <input type="text" class="form-control" name="harga" placeholder="Enter Harga">
    </p>
    <p>Foto Menu</p>
    <p>
        <input type="file" name="foto_menu" >
    </p>
    <p>
    <input type="submit" value="Submit" class="btn btn-default">
    </p>
    </form>
</div>
</div>