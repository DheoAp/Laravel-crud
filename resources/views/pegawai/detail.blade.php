@extends('layout.master')

@section('dashboardTitle','Detail Pegawai')
@section('content')
<div class="card bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header">Pegawai</div>
  <div class="card-body">
    <h5 class="card-title">{{$pegawai->nama}}</h5>
    <p class="card-text">{{$pegawai->alamat}}</p>
    <p class="card-text">{{$pegawai->tgl_lahir}}</p>
  </div>
  <div class="card-footer bg-transparent">
    <a href="{{ route('pegawai') }}" class="btn btn-sm btn-danger">Kembali</a>
  </div>
</div>
@endsection