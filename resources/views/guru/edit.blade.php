@extends('layout.master')

@section('dashboardTitle','Edit Guru')
@section('content')
	<div class="card mb-4">
		<div class="card-header">
			Edit Data
		</div>
		
		<div class="card-body">
			<div class="row ">
				<div class="col-md-6">
          <form method="post" action="{{url('update-guru/'.$guru->nip)}}" enctype="multipart/form-data">
            @method('put')
						@csrf
						<div class="form-group">
							<label for="nip">NIP</label>
							<input readonly type="text" name="nip" value="{{ $guru->nip }}" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukan nip">
							@error('nip')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
						</div>
	
						<div class="form-group">
							<label for="nama_guru">Nama Guru</label>
							<input type="text" name="nama_guru" value="{{ $guru->nama_guru }}" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" placeholder="Masukan nama guru">
							@error('nama_guru')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
						</div>
						
						<div class="form-group">
							<label for="mapel">Mata Pelajaran</label>
							<select name="id_mapel" class="custom-select @error('id_mapel') is-invalid @enderror">
								@foreach ($mapel as $m)
									<option value="{{$m->id_mapel}}" {{ $m->id_mapel == $guru->id_mapel ? 'selected' : '' }}>{{$m->mapel}}</option>
								@endforeach
							</select>
							
							@error('mapel')
							<div class="invalid-feedback">
							{{ $message }}
							</div>
							@enderror
            </div>
            
						<div class="row">
              <div class="col-sm-4">
                <img src="{{url('foto/'.$guru->foto_guru)}}" class="card-img-top" alt="...">
              </div>
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="foto_guru">Ganti Foto</label>
                  <input type="file" name="foto_guru" value="{{ old('foto_guru') }}" class="form-control @error('foto_guru') is-invalid @enderror" id="nama" >    
                  <small class="form-text text-muted">
                    format :jpg,jpeg,png|max:1Mb
                  </small>              
                  @error('foto_guru')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
						
						<div class="form-group mt-2">
							<button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('guru') }}" class="btn btn-danger">Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection