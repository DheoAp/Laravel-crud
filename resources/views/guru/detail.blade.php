@extends('layout.master')

@section('dashboardTitle','Detail Guru')
@section('content')
  <div class="card" style="width: 18rem;">
    <img src="{{url('foto/'.$guru->foto_guru)}}" class="card-img-top" alt="...">
    <div class="card-body d-flex justify-content-center">
      <span class="card-text">NIP : {{$guru->nip}}</span>
      <span class="card-text">Nama : {{$guru->nama_guru}}</span>
      <span class="card-text">Mapel :  {{$guru->mapel}}</span>
    </div>
    <div class="card-footer bg-transparent">
      <a href="{{ route('guru') }}" class="btn btn-sm btn-danger">Kembali</a>
      <a href="{{ url('edit-guru/'.$guru->nip) }}" class="btn btn-sm btn-primary">Ubah</a>
    </div>
  </div>
@endsection