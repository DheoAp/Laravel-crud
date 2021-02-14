@extends('layout.master')

@section('dashboardTitle','Tambah Guru')
@section('content')
	<div class="card mb-4" style="max-width: 50rem;">
		<div class="card-header">
			Tambah Data
		</div>
		
		<div class="card-body">
			<div class="row ">
				<div class="col-md-4">
          <form method="post" action="{{ route('insert') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" name="nip" value="{{ old('nip') }}" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukan nip">
							@error('nip')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
						</div>
	
						<div class="form-group">
							<label for="nama_guru">Nama Guru</label>
							<input type="text" name="nama_guru" value="{{ old('nama_guru') }}" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" placeholder="Masukan nama guru">
							@error('nama_guru')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
						</div>
						
						<div class="form-group">
							<label for="mapel">Mata Pelajaran</label>
							<select name="id_mapel" class="custom-select @error('id_mapel') is-invalid @enderror">
								<option value="">Pilih Mata Pelajaran</option>
								@foreach ($mapel as $m)
									<option value="{{$m->id_mapel}}" {{ old('id_mapel') == $m->id_mapel ? 'selected' : '' }}>{{$m->mapel}}</option>
								@endforeach
							</select>
							
							@error('mapel')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
            </div>
            
						<div class="form-group">
							<label for="foto_guru">Foto</label>
              <input type="file" name="foto_guru" value="{{ old('foto_guru') }}" class="form-control @error('foto_guru') is-invalid @enderror" id="nama" >
              
							@error('foto_guru')
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