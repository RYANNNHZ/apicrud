<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(){
        $siswa = siswa::all();
        $data = [
            'message' => 'geting siswa data successfully',
            'siswa' => $siswa
        ];
        return response()->json($data);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'umur' => 'numeric|required',
            'kelas' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator);
        }

        $siswa = siswa::create([
            'nama' => $request->input('nama'),
            'umur' => $request->input('umur'),
            'kelas' => $request->input('kelas'),
        ]);


        return response()->json([
            'message' => 'siswa created successfully',
            'siswa' => $siswa
        ]);

    }


    public function delSiswa($id){

        $siswa = siswa::find($id)->delete();

        $data = [
            'message' => 'deleting data succesfully',
            'siswa' => siswa::all()
        ];

        return response()->json($data);
    }


    public function show($id){
        $siswa = siswa::find($id);
        $data = [
            'message' => `geting `.$siswa->nama.` successfully`,
            'siswa' => $siswa
        ];

        return response()->json($data);
    }


    public function upSiswa(Request $request,$id){
        $siswa = siswa::find($id)->update([
            'nama' => $request->input('nama'),
            'umur' => $request->input('umur'),
            'kelas' => $request->input('kelas'),
        ]);


        $data = [
            'message' => 'updating data succesfully',
            'siswa' => siswa::all()
        ];

        return response()->json($data);
    }
}
