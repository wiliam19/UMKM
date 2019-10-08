<table border="1">
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Level</th>
		<th>Opsi</th>
	</tr>
	@foreach($users as $no=>$user)
	<tr>
		<td>{{ $no+1}}</td>
		<td>{{ $user->username }}</td>
		<td>{{ $user->level}}</td>
		<td>
			<a href='/edit-user/{{ $user->id}}'>Edit</a>
			<a href='/delete-user/{{ $user->id}}'>Hapus</a>
		</td>
	</tr>
	@endforeach
</table>
	<a href='/form-user'>Tambah</a>
