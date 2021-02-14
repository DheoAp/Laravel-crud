@extends('layout.master')
@section('title','Pegawai')
@section('dashboardTitle','Data Pegawai')

@section('content')
<a href="{{ route('tambahPegawai') }}" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable pegawai
	</div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Tgl lahir</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				
				<tbody>				
					@foreach ($pegawai as $p)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$p->nama}}</td>
								<td>{{$p->alamat}}</td>
								<td>{{$p->tgl_lahir}}</td>
								<td class="text-center">
									<form class="d-inline" action="hapus/{{$p->id}}" method="POST">
										<div class="btn-group">
											<a href="ubah-pegawai/{{ $p->id }}" class="btn btn-sm btn-primary">Ubah</a>
											<a href="detail-pegawai/{{ $p->id }}" class="btn btn-sm btn-info">detail</a>
											@method('delete')
											@csrf
											<button onclick="return confirm('Yakin hapus?');" type="submit" class="btn btn-sm btn-danger">Hapus</button>
										</div>
									</form>
								</td>
							</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection