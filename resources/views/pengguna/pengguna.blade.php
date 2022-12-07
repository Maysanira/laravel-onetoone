<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel #23 : Relasi One To One Eloquent</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
	<div class="container">
		<div class="card mt-5">
			<div class="card-body">
				<h3 class="text-center"><a href="https://www.malasngoding.com">www.malasngoding.com</a></h3>
				<h5 class="text-center my-4">Eloquent One To One Relationship</h5>
				<table class="table table-bordered table-striped">
					<thead>
					<a href="{{route('pengguna.create')}}" class="btn btn-md btn-success mb-3">Tambah Pengguna</a>
						<tr>
							<th>Pengguna</th>
							<th>Nomor Telepon</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pengguna as $p)
						<tr>
							<td>{{ $p->nama }}</td>
							<td>{{ $p->telepon->nomortelepon }}</td>

							<td class="text-center">
                                        
                                        <a href="{{ route('pengguna.edit', $p->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $p->id) }} " method="post" >
                                    

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
											
                                        </form>
                                    </td>
							<!-- <td>
								<a href="{{ route('pengguna.edit', $p->id) }} " >Edit</a>
													
								@csrf
                                @method('DELETE')
							|| <a href="{{route('pengguna.destroy', $p->id)}} ">Hapus</a>
							<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $p->id) }} " method="post" >
							</form> -->
						</td>
						</tr>
					@endforeach

						
					</tbody>
					
				</table>
			</div>
		</div>
	</div>
 
</body>
</html>