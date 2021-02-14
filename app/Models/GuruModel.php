<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GuruModel extends Model
{
	use HasFactory;
	
	function getAllGuru()
	{
			return DB::table('tbl_guru')
					->leftJoin('tbl_mapel', 'tbl_mapel.id_mapel', '=', 'tbl_guru.id_mapel')
					->get();
		// return DB::table('tbl_guru')->get();
	}

	function detailGuru($nip){
		return DB::table('tbl_guru')
					->Join('tbl_mapel', 'tbl_mapel.id_mapel', '=', 'tbl_guru.id_mapel')
					->where('nip',$nip)->first();
	}

	function mapelGuru(){
		return DB::table('tbl_mapel')->get();
	}
	
	function addData($data){
		
		DB::table('tbl_guru')->insert($data);
	}

	function editData($nip){
		 
		return DB::table('tbl_guru')->where('nip',$nip)->first();
	}

	function updateData($nip,$data){
		DB::table('tbl_guru')->where('nip', $nip)->update($data);
	}

	function deleteData($nip){
		
		DB::table('tbl_guru')
			->where('nip',$nip)
			->delete();
	}
}
