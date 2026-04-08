<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Sertifikat;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;

class SertifikatController extends Controller
{
    public function createTraining(Request $request){
        $training = new Training([
            'nama'=>$request->nama,
            'tgl'=>$request->tgl,
            'trainer'=>$request->trainer,
            'lokasi'=>$request->lokasi,
        ]);

        $training->save();

        return response()->json('Training created!');
    }

    public function listTraining(){
        $training=Training::orderBy('created_at','desc')->get();
        return response()->json($training);
    }

    public function detailTraining($id){
        $training=Training::find($id);
        return response()->json($training);
    }

    public function listPeserta($id){
        $peserta=DB::table("vpesertatraining")->where('trainingid',$id)->get();

        return response()->json($peserta);
    }

    public function detailPeserta($id){
        $peserta=DB::table("vpesertatraining")->where('id',$id)->first();

        return response()->json($peserta);
    }

    public function uploadPeserta(Request $request){
        // dd(json_decode($request->peserta));
        foreach(json_decode($request->peserta) as $r){
           // dd($r->NAMA);
           // $peserta=Peserta::where('trainingid',$request->idtraining)->where('pin',$r->PIN)->first();
           $score=0;
           $status=0;
           if($r->SCORE){$score=$r->SCORE;}
           if($r->STATUS){$status=$r->STATUS;}
           Peserta::updateOrCreate([
            'trainingid' => $request->idtraining,'pin'=>$r->PIN
        ], [
            'pin'=>$r->PIN,
            'trainingid'=>$request->idtraining,
            'score'=>$score,
            'status'=>$status,

        ]);
        }
         return "Peserta berhasil ditambahkan";
    }

    public function deletePeserta(Request $request){
        // dd($request);
        Peserta::where("pin",$request->idpeserta)->where("trainingid",$request->idtraining)->delete();

        return "Peserta berhasil di delete";
    }

    public function sertifikatTraining(Request $request){
        // dd($request->file('sertifikat'));
        $file = $request->file('sertifikat');
        // dd($file);

        $sertifikatname = '/sertifikat/' . $request->input('idtraining') . '.' . $file->extension();

        $file->storePubliclyAs('public', $sertifikatname);

        $training=Training::find($request->input('idtraining'));
        $fontcolor=$request->fontcolor;
        if(!$fontcolor){
            $fontcolor='black';
        };
        $training->update(['template'=>$sertifikatname,'fontcolor'=>$fontcolor,'texttemplate1'=>$request->texttemplate1]);

        return response()->json('Template uploaded succesfully!');
    }


}
