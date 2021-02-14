@extends('layout.master')
@section('title','Guru')
@section('dashboardTitle','Data Guru')

@section('content')
<a href="{{ url('tambah-guru') }}" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable guru
	</div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Mata Pelajaran</th>
						{{-- <th>Foto</th> --}}
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				
				<tbody>				
					@foreach ($guru as $g)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$g->nip}}</td>
							<td>{{$g->nama_guru}}</td>
							<td>{{$g->mapel}}</td>
							{{-- <td><img src="{{ url('foto/'.$g->foto_guru) }}" width="100px"></td> --}}
							<td class="text-center">
								<form class="d-inline" action="{{url('hapus-guru/'.$g->nip)}}" method="POST">
									<div class="btn-group">
										<a href="{{ url('edit-guru/'.$g->nip) }}" class="btn btn-sm btn-primary">Ubah</a>
										<a href="{{ 'detail-guru/'.$g->nip }}" class="btn btn-sm btn-info">detail</a>
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