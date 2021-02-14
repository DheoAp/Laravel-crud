<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$pegawai = Pegawai::all();
		return view('pegawai.index',compact('pegawai'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('pegawai.tambah');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'nama' => 'required',
			'alamat' => 'required',
			'tgl_lahir' => 'required',
		],[
			'nama' => 'Nama harus diisi'
		]);
		
		Pegawai::create($request->all());
		return redirect('data-pegawai');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Pegawai $pegawai)
	{
		return view('pegawai.detail',compact('pegawai'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Pegawai $pegawai)
	{
		return view('pegawai.ubah',compact('pegawai'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Pegawai $pegawai)
	{
		Pegawai::where('id', $pegawai->id)
						->update([
							'nama' => $request->nama,
							'alamat' => $request->alamat,
							'tgl_lahir' => $request->tgl_lahir
						]);
		return redirect('data-pegawai');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Pegawai $pegawai)
	{
		Pegawai::destroy($pegawai->id);
		return redirect('data-pegawai');
	}
}
