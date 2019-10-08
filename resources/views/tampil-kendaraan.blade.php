@extends('base')

@section("content")

<h3>Data Kendaraan</h3>
<table class="table table-bordered">
	<tr>
		<th>Nomor</th>
		<th>Pemilik_id</th>
		<th>Deposit</th>
		<th>Nopol</th>
	</tr>
	@foreach($kendaraan as $no=>$kendaraan)
	<tr>
		<td>{{ $no+1}}</td>
		<td>{{ $kendaraan->pemilik_id }}</td>
		<td>{{ $kendaraan->deposit}}</td>
		<td>{{ $kendaraan->nopol}}</td>
		<td>
			<a class="btn btn-warning" 
			href='/edit-kendaraan/{{ $kendaraan->id}}'>Edit</a> <br>
			<a class="btn btn-danger"
			href='/delete-kendaraan/{{ $kendaraan->id}}'>Hapus</a>
		</td>
	</tr>
	@endforeach
</table>
	@endsection
