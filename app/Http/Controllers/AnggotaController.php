<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Validator;

// use Illuminate\Support\Facades\Validator;
class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $anggotas = Anggota::All();
        // $ruangans = "Cek data";

        return view('anggotas/index', compact('anggotas'));
    }
    public function showAll() {
        return response()->json(Anggota::All());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'kd_anggota' =>'required',
            'nm_anggota' =>'required',
            'jk' =>'required',
            'tp_lahir' =>'required',
            'tg_lahir' =>'required',
            'alamat' =>'required',
            'no_hp' =>'required',
            'jns_anggota' =>'required',
            'status' =>'required',
            'jml_pinjam' =>'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $anggota = Ruangan::create([
            'kd_anggota' => $request->kd_anggota,
            'nm_anggota' => $request->nm_anggota,
            'jk' => $request->jk,
            'tp_lahir' => $request->tp_lahir,
            'tg_lahir' => $request->tg_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jns_anggota' => $request->jns_anggota,
            'status' => $request->status,
            'jml_pinjam' => $request->jml_pinjam,
        ]);
        return response()->json([
            'message' => 'Ruangan successfully created',
            'ruangan' => $anggota
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggotas = Anggota::find($id);
        return response()->json($anggotas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
