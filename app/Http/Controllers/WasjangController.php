<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use App\Models\Wasjang;
use App\Models\WasjangHeavyModel;
use Illuminate\Http\Request;

class WasjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wasjang::where('status', '-')->get();
        // Wasjang::where('status', '-')->update(['status' => 'WA Sent']);
        return response()->json($data);
    }

    public function updateStatus($nowasjang)
    {
        $wasjang = Wasjang::where('nowasjang', $nowasjang)->first();

        if ($wasjang) {
            $wasjang->status = 'WA Sent';
            $wasjang->save();

            return response()->json(['message' => 'Status updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Wasjang not found'], 404);
        }
    }

    public function indexQC()
    {
        $data = Temuan::where('status', '-')->get();
        Temuan::where('status', '-')->update(['status' => 'WA Sent']);
        return response()->json($data);
    }

    public function indexWasjangBerat(){
	$data = WasjangHeavyModel::where('status', '-')->get();
        WasjangHeavyModel::where('status', '-')->update(['status' => 'WA Sent']);
        return response()->json($data);
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
        $training = new Wasjang([
            'nowasjang' => $request->nowasjang,
            'tgl_pelaporan' => $request->tgl_pelaporan,
            'pin_reporter' => $request->pin_reporter,
            'reporter' => $request->reporter,
            'department_temuan' => $request->department_temuan,
            'detail_temuan' => $request->detail_temuan,
            'saran_temuan' => $request->saran_temuan,
            'foto_temuan' => $request->foto_temuan,
            'lokasi_temuan' => $request->lokasi_temuan,
            'terlapor' => $request->terlapor,
            'tanpa_nama' => $request->tanpa_nama,
            'status' => '-'
        ]);

        $training->save();

        return response()->json('Wasjang created!');
    }

    public function saveHeavyWasjang(Request $request)
    {
        $training = new WasjangHeavyModel([
            'nowasjang' => $request->nowasjang,
            'tgl_pelaporan' => $request->tgl_pelaporan, 
            'pin_reporter' => $request->pin_reporter,
            'reporter' => $request->reporter,
            'department_temuan' => $request->department_temuan, 
            'terlapor' => $request->terlapor, // Column H
            'detail_temuan' => $request->detail_temuan, // Column J
            'saran_temuan' => $request->saran_temuan, // Column K
            'foto_temuan' => $request->foto_temuan, // Column L
            'lokasi_temuan' => $request->lokasi_temuan, // Column G
            'tanpa_nama' => $request->tanpa_nama, // Column I
            'no_wasjang_sebelumnya' => $request->no_wasjang_sebelumnya, // Column B
 	    'total_nominal' => $request->total_nominal,
	    'no_wasjang_kedua' => $request->no_wasjang_kedua,
            'dana_wasjang_berat' => $request->dana_wasjang_berat,
            'tindakan' => $request->tindakan,
            'status' => '-'
        ]);

        $training->save();

        return response()->json($request);
    }

    public function storeQC(Request $request)
    {
        $training = new Temuan([
            'nowasjang' => $request->nowasjang,
            'tgl_pelaporan' => $request->tgl_pelaporan,
            'pin_reporter' => $request->pin_reporter,
            'reporter' => $request->reporter,
            'department_temuan' => $request->department_temuan,
            'detail_temuan' => $request->detail_temuan,
            'saran_temuan' => $request->saran_temuan,
            'foto_temuan' => $request->foto_temuan,
            'lokasi_temuan' => $request->lokasi_temuan,
            'terlapor' => $request->terlapor,
            'tanpa_nama' => $request->tanpa_nama,
            'status' => '-'
        ]);

        $training->save();

        return response()->json('QC created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wasjang  $wasjang
     * @return \Illuminate\Http\Response
     */
    public function show(Wasjang $wasjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wasjang  $wasjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Wasjang $wasjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wasjang  $wasjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wasjang $wasjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wasjang  $wasjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wasjang $wasjang)
    {
        //
    }
}
