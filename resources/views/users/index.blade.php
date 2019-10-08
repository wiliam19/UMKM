@extends('base')

@section('content') 
		<h3>Data Pengguna</h3> 
		<hr> 
			<a href="{{ route("user.create") }}" class="btn btn-primary">Tambah</a> 
			<hr> 
			<table class="table table-bordered"> 
				<thead> 
					<tr>
					 <th>#</th> 
					 <th>Username</th> 
					 <th>Level</th> 
					 <th>Kelurahan</th> 
					 <th>Kecamatan</th> 
					 <th>Opsi</th> 
					</tr> 
				</thead> 
				<tbody> 
					@foreach ($users as $no=>$user) 
					<tr> 
						<td>{{ $no + 1 }}</td> 
						<td>{{ $user->username }}</td> 
						<td>{{ $user->level }}</td> 
						<td>{{ $user->kelurahan }}</td> 
						<td>{{ $user->kecamatan }}</td> 
						<td> 
							<div class="btn-group btn-group-sm"> <a class="btn btn-warning" href="{{ route('user.edit', ['id' => $user->id]) }}">Edit</a> <a class="btn btn-danger" href="{{ route('user.delete', ['id' => $user->id]) }}">Del</a> </div>
								</td> 
							</tr> 
						@endforeach 
					</tbody> </table> @endsection 