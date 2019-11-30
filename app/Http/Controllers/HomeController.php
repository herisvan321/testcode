<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuModel;
use App\PesananModel;
use App\penghasilanModel;
use App\User;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $id = substr("14100009",4,6);
        // $tmbah = (int) $id + 1;
        // return sprintf("%04s",$tmbah);
        return view('pages.index');
    }

    public function dinapages() 
    {
        $status = auth()->user()->status;
        if($status != '0')
        {
            Session::flash('gagal','maaf anda Bukan Admin');
            return back();
        }

        $tampil = '';
        $url = $_SERVER['REQUEST_URI'];
        if($url == '/home/pages/menu')
        {
            $status = 'menu';
        }
        elseif($url == '/home/pages/reviewmenu')
        {
            $tampil = MenuModel::orderBy('id_menu','desc')->get();
            $status = 'reviewmenu';
        }
        else{
            abort(404);
        }
        return view('pages.admin.dinapages', compact('status','tampil'));
    }

    public function svdinapages(Request $r)
    {
        $status = auth()->user()->status;
        if($status != '0')
        {
            Session::flash('gagal','maaf anda Bukan Admin');
            return back();
        }


        $url = $_SERVER['REQUEST_URI'];
        if($url == '/home/pages/menu')
        {
            $r->validate([
                'nama_menu' => 'required|max:191',
                'foto_menu' => 'required',
            ]);

            $input = $r->all();

            $slimit = str_limit($r->nama_menu,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('foto_menu');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/fotomenu',$namafile);

            $input['foto_menu'] = $namafile;

            $save = MenuModel::create($input);


        }
        else
        {
            abort(500);
        }

        if($save)
        {
            Session::flash('sukses','data berhasil disimpan!');
        }
        else{
            Session::flash('gagal','data gagal disimpan!');
        }
        return back();
    }
    public function updinapages(Request $r, $id)
    {
        $status = auth()->user()->status;
        if($status != '0')
        {
            Session::flash('gagal','maaf anda Bukan Admin');
            return back();
        }


        $url = $_SERVER['REQUEST_URI'];
        if($url == '/home/pages/menu/update/'. $id)
        {
            
            $up = MenuModel::find($id);
            $up->nama_menu = $r->nama_menu;
            $up->type = $r->type;
            $up->status = $r->status;

           if(@count($r->foto_menu) > 0)
           {
            $target = 'upload/fotomenu/'.$up->foto_menu;
            unlink($target);


            $slimit = str_limit($r->nama_menu,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('foto_menu');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/fotomenu',$namafile);

            $up->foto_menu = $namafile;
           }
           else{
            $up->foto_menu = $up->foto_menu;
           }
           $up->update();
        }
        else
        {
            abort(500);
        }

        if($up)
        {
            Session::flash('sukses','data berhasil diupdate!');
        }
        else{
            Session::flash('gagal','data gagal didihapus!');
        }
        return back();
    }

    public function dldinapages(Request $r,  $id)
    {
        $status = auth()->user()->status;
        if($status != '0')
        {
            Session::flash('gagal','maaf anda Bukan Admin');
            return back();
        }


        $url = $_SERVER['REQUEST_URI'];
        if($url == '/home/pages/menu/delete/'. $id)
        {
           
           $del = MenuModel::find( $id);
           $target = 'upload/fotomenu/'.$del->foto_menu;
           unlink($target);
           $del->delete();
        }
        else
        {
            abort(500);
        }

        if($del)
        {
            Session::flash('sukses','data berhasil didihapus!');
        }
        else{
            Session::flash('gagal','data gagal didihapus!');
        }
        return back();
    }

    public function vdinapages()
    {
        $status = auth()->user()->status;
        $id_user = auth()->user()->id_user;
        $url = $_SERVER['REQUEST_URI'];
        if($url == '/home/pages/1/pesanan')
        {
            $kondisi = 'pesanan';

            $tampil = MenuModel::orderBy('id_menu','desc')->get();

            
        }

        elseif($url == '/home/pages/1/reviewpesanan')
        {
            $kondisi = 'reviewpesanan';
            if($status == '2')
            {
                $tampil = PesananModel::orderBy('created_at','desc')
                ->where('status','0')->where('id_user',$id_user)
                ->get();
                //dd($id_user);
            }else{
                $tampil = PesananModel::orderBy('created_at','desc')
                ->where('status','0')
                ->get();
            }
            
        }
         elseif($url == '/home/pages/1/pembayaran')
        {
            if($status != '1')
            {
                Session::flash('gagal','maaf anda Bukan Kasir');
                return back();
            }
            $kondisi = 'pembayaran';
            $tampil = PesananModel::orderBy('created_at','desc')
            ->where('status','0')
            ->get();   
        }

        return view('pages.dinapages',compact('kondisi','tampil'));
    }

    public function vvdinapages()
    {
        
            $tampil = PesananModel::orderBy('created_at','desc')->get();

            if(@$r->btncari)
            {
                $tampil = MenuModel::orderBy('id_menu','desc')->where('nama_menu','LIKE','%'.$r->txtcari.'%')->get();
            }
    
        return view('pages.include.reviewpesanan',compact('kondisi','tampil'));
    }


    public function svpesanan(Request $r)
    {
        $cek = PesananModel::orderBy('created_at', 'desc')->first();
        $total = (int) $r->harga * $r->jumlah;

        if(@count($cek) > 0)
        {
            $pengambilan = substr($cek->id_pesanan, 12,15);
            $tambah = (int) $pengambilan + 1;
            $anggka = sprintf("%03s",$tambah);
            $id_pesanan = "ERP".date('dmY')."-".$anggka;
        }
        else{
            $id_pesanan = "ERP".date('dmY')."-"."001";
        }
        
        $input = new PesananModel();
        $input->id_pesanan = $id_pesanan;
        $input->no_meja = $r->no_meja;
        $input->nama_pelanggan = $r->nama_pelanggan;
        $input->harga = $r->harga;
        $input->jumlah = $r->jumlah;
        $input->total = $total;
        $input->status = "0";
        $input->id_menu = $r->id_menu;
        $input->id_user = $r->id_user;
        $input->save();

        if($input)
        {
            Session::flash('sukses', 'pesanan sedang diproses!');
        }
        else
        {
            Session::flash('gagal', 'pesanan gagal diproses!');
        }

        return back();


    }
    public function dlpesanan(Request $r,$id)
    {
     
        $dl = PesananModel::find($id);
        $dl->delete();

        if($dl)
        {
            Session::flash('sukses', 'pesanan dihapus!');
        }
        else
        {
            Session::flash('gagal', 'pesanan gagal dihapus!');
        }

        return back();


    }
    public function uuppesanan(Request $r,$id)
    {
       
        $up = PesananModel::find($id);
        $up->no_meja= $r->no_meja;
        $up->nama_pelanggan = $r->nama_pelanggan;
        $up->jumlah = $r->jumlah;
        $up->total = $up->harga * $r->jumlah;
        $up->update();

        if($up)
        {
            Session::flash('sukses', 'pesanan diupdate!');
        }
        else
        {
            Session::flash('gagal', 'pesanan gagal diupdate!');
        }
        return back();
    }

    public function bypesanan(Request $r)
    {
        $cek = PesananModel::find($r->id);
        $cek->status = '2';
        $cek->update();

        $kembalian = $r->bayar - $r->total;
        $in = new penghasilanModel();
        $in->no_meja  = $r->no_meja;
        $in->nama_pelanggan = $r->nama_pelanggan;
        $in->total = $r->total;
        $in->bayar = $r->bayar;
        $in->kembalian = $kembalian;
        $in->id_user = $r->id_user;
        $in->id_pesanan = $r->id_pesanan;
        $in->tanggal = date('Y-m-d');
        $in->save();

        if($in)
        {
            Session::flash('sukses', 'Pembayaran Telah Selesai Silahkan Ke menu Faktur Untuk Melakukan Pencetakan faktu, uang Kembalia Anda : '.$kembalian);
        }
        else
        {
            Session::flash('gagal', 'pesanan gagal diupdate!');
        }

        return back();
    }

    public function faktur(Request $r)
    {
        $status = auth()->user()->status;
        $id_user = auth()->user()->id_user;
        if($status == '2')
        {
            $tampil = penghasilanModel::orderBy('id','desc')
            ->where('tanggal','LIKE','%'.date('Y-m-d').'%')
            ->where('id_user', $id_user)
            ->get();
        }
        else{
            $tampil = penghasilanModel::orderBy('id','desc')->where('tanggal','LIKE','%'.date('Y-m-d').'%')->get();
        }
        
        return view('pages.laporan.faktur',compact('tampil'));
    }

    public function harian(Request $r)
    {
        $tampil = penghasilanModel::GroupBy(DB::raw('DAY(tanggal)'))
             ->select(DB::raw('DAY(tanggal) as hari,count(*) as transaksi, sum(total) as total'))
             ->orderBy('hari','desc')
             ->where('tanggal', 'LIKE', '%'.date('d').'%')
             ->get();
        return view('pages.laporan.harian',compact('tampil'));
    }

    public function bulanan(Request $r)
    {
        $tampil =penghasilanModel::GroupBy(DB::raw('MONTH(tanggal)'))
             ->select(DB::raw('MONTH(tanggal) as bulan,count(*) as transaksi, sum(total) as total'))
             ->orderBy('bulan','desc')
             ->get();
        return view('pages.laporan.bulanan',compact('tampil'));
    }

    public function tahunan(Request $r)
    {
        $tampil = penghasilanModel::GroupBy(DB::raw('YEAR(tanggal)'))
             ->select(DB::raw('YEAR(tanggal) as tahun,count(*) as transaksi, sum(total) as total'))
             ->orderBy('tahun','desc')
             ->get();
        
        return view('pages.laporan.tahunan',compact('tampil'));
    }

    public function cetak($id){
        $tampil = penghasilanModel::where('id_pesanan',$id)->first();
        return view('pages.cetak',compact('tampil'));
    }

    public function getuser()
    {
        return view('pages.edituser');
    }

     public function upuser(Request $r, $id)
    {
        

        $up = User::find($id);
        $up->name = $r->name;
        $up->email = $r->email;

        if($r->password == "")
        {
            $up->password = $up->password;
        }
        else
        {
            $r->validate([
                'password' => 'min:6'
            ]);
            $up->password =  bcrypt($r->password) ;
        }
        $up->update();
        if($up)
        {
            Session::flash('sukses','Data Berhasil  Di Update!');
        }
        else
        {
            Session::flash('gagal','Data Gagal Di Update!');
        }
        return back();
    }
}
