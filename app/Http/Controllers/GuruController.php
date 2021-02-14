<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class GuruController extends Controller
{
	function __construct()
	{
		$this->GuruModel = new GuruModel();
	}
	
	function index(){
		$data = [
			'guru' => $this->GuruModel->getAllGuru(),
		];

		return view('guru.index',$data);
	}

	function detail($nip){
		if(!$this->GuruModel->detailGuru($nip)){
			abort(404); 
		}
		$data = [
			'guru' => $this->GuruModel->detailGuru($nip),
			'mapel' => $this->GuruModel->mapelGuru(),
		];

		return view('guru.detail',$data);
	}

	function tambah(){
		$data = [
			'mapel' => $this->GuruModel->mapelGuru(),
		];
		return view('guru.tambah',$data);
	}

	function insert(){

		Request()->validate([
			'nip' => 'required|numeric|min:8|unique:tbl_guru,nip',
			'nama_guru' => 'required',
			'id_mapel' => 'required',
			'foto_guru' => 'required|mimes:jpg,jpeg,png|max:1024',
		],[
			'nama_guru' => 'Nama harus diisi'
		]);

		// upload gambar
		$file = Request()->foto_guru;
		$fileName = Request()->nip.'.'.$file->extension();
		$file -> move(public_path('foto'), $fileName);

		$data = [
			'nip' => Request()->nip,
			'nama_guru' => Request()->nama_guru,
			'id_mapel' => Request()->id_mapel,
			'foto_guru' => $fileName,
		];
		$this->GuruModel->addData($data);
		return redirect('data-guru');
	}

	function edit($nip){
		if(!$this->GuruModel->editData($nip)){
			abort(404);
		}

		$data = [
			'guru' => $this->GuruModel->editData($nip),
			'mapel' => $this->GuruModel->mapelGuru(),
		];
		return view('guru.edit',$data);
	}

	function update($nip){

		if(Request()->foto_guru <> ""){
			// jika ganti foto 
			Request()->validate([
				'nama_guru' => 'required',
				'id_mapel' => 'required',
				'foto_guru' => 'mimes:jpg,jpeg,png|max:1024',
			],[
				'nama_guru' => 'Nama harus diisi'
			]);
	
			// upload gambar
			$file = Request()->foto_guru;
			$fileName = Request()->nip.'.'.$file->extension();
			$file -> move(public_path('foto'), $fileName);
	
			$data = [
				'nip' => Request()->nip,
				'nama_guru' => Request()->nama_guru,
				'id_mapel' => Request()->id_mapel,
				'foto_guru' => $fileName,
			];
			$this->GuruModel->updateData($nip, $data);
		}else{
			// jika tidak ganti foto
			$data = [
				'nip' => Request()->nip,
				'nama_guru' => Request()->nama_guru,
				'id_mapel' => Request()->id_mapel,
			];
			$this->GuruModel->updateData($nip, $data);
		}
		
		return redirect('data-guru');
	}

	function delete($nip){
		// hapus gambar di folder
		$gambar = $this->GuruModel->detailGuru($nip);
		if($gambar->foto_guru <> ""){
				unlink(public_path('foto'). '/' . $gambar->foto_guru);
		}
		$this->GuruModel->deleteData($nip);
		return redirect('data-guru');
	}


}
