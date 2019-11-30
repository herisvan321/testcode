<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $fillable = [
        'nama_menu', 'type', 'status', 'harga' , 'foto_menu'
    ];
    public $primaryKey = 'id_menu';
}
