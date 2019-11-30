<!DOCTYPE html>
<html>
<head>
	<title>Cetak Faktur</title>
</head>
<body>
<h2>Faktur Aplikasi Cafe</h2><hr>
<table>
	<tr>
		<td>Nomor Faktur</td>
		<td>:</td>
		<td>{{$tampil->id_pesanan}}</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>{{$tampil->nama_pelanggan}}</td>
	</tr>
</table>
<table>
	<tr>
		<th>Menu</th>
		<th>Jumlah</th>
		<th>Harga</th>
	</tr>
	<tr>
		<td>
			@php($cek= DB::table('pesanan_models')->where('id_pesanan',$tampil->id_pesanan)->first())
			@php($cm = DB::table('menu_models')->where('id_menu',$cek->id_menu)->first())
			{{$cm->nama_menu}}
		</td>
		<td align="center"> {{$cek->jumlah}}</td>
		<td align="right">{{$cek->harga}}</td>
	</tr>
	<tr>
		<td></td>
		<td >
			<b>Total :</b>
		</td>
		<td style="border-top:1px solid #000">
			{{$tampil->total}}
		</td>
	</tr>
	<tr>
		<td></td>
		<td >
			<b>Bayar :</b>
		</td>
		<td>
			{{$tampil->bayar}}
		</td>
	</tr>
	<tr>
		<td></td>
		<td >
			<b>Kembalian :</b>
		</td>
		<td>
			{{$tampil->kembalian}}
		</td>
	</tr>
</table>
<p>dicetak oleh {{auth()->user()->name}}</p>
<span>tanggal {{ date('d-m-Y')}}</span>
</body>
</html>