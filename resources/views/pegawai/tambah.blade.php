@extends('layout.master')

@section('dashboardTitle','Tambah Pegawai')
@section('content')
	<div class="card mb-4">
		<div class="card-header">
			Tambah Data
		</div>
		
		<div class="card-body">
			<div class="row d-flex justify-content-center">
				<div class="col-md-4">
					<form method="post" action="{{ route('simpanPegawai') }}">
						@csrf
						<div class="form-group">
							<label for="nama">Nama Pegawai</label>
							<input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Pegawai">
							@error('nama')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
						</div>
	
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30" rows="5" value="{{ old('alamat') }}" placeholder="Masukan Alamat"></textarea>
							@error('alamat')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
						</div>
						
						<div class="form-group">
							<label for="tgl_lahir">Tanggal lahir</label>
							<input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" class="form-control @error('tgl_lahir') is-invalid @enderror" id="nama" placeholder="Masukan Tanggal lahir">
							@error('tgl_lahir')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection