<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specsheet;
use Illuminate\Support\Facades\DB;

class SpecsheetController extends Controller
{
    public function listspk(){
        $spk=DB::table('vspecsheets')->get();

        return response()->json($spk);
    }

    public function jmlspkbaru(){
        $spk=DB::table('vspecshtbaru')->get();

        return response()->json($spk);
    }

    public function viewspk($id){
        $spk=DB::table('vspecsheets')->where('id',$id)->first();

        return response()->json($spk);
    }
    public function createSpeck(Request $request){
        $specsheet = new Specsheet([
            "so"=>$request->input("so"),
            "customer"=>$request->input("customer"),
            "orderkategori"=>$request->input("orderkategori"),
            "qty"=>$request->input("qty"),
            "mintoleransi"=>$request->input("mintoleransi"),
            "maxtoleransi"=>$request->input("maxtoleransi"),
            "ganjil"=>$request->input("ganjil"),
            "printing"=>$request->input("printing"),
            "printingdepan"=>$request->input("printingdepan"),
            "printingbelakang"=>$request->input("printingbelakang"),
            "artwork"=>$request->input("artwork"),
            "hargajual"=>$request->input("hargajual"),
            "komisi"=>$request->input("komisi"),
            "biayajahitbawah"=>$request->input("biayajahitbawah"),
            "biayajahitmulut"=>$request->input("biayajahitmulut"),
            "biayaangkut"=>$request->input("biayaangkut"),
            "biayalainlain"=>$request->input("biayalainlain"),
            "warnakarung"=>$request->input("warnakarung"),
            "motifkarung"=>$request->input("motifkarung"),
            "keteranganmotif"=>$request->input("keteranganmotif"),
            "denier"=>$request->input("denier"),
            "kualitasbenang"=>$request->input("kualitasbenang"),
            "kodebal"=>$request->input("kodebal"),
            "lebarkarung"=>$request->input("lebarkarung"),
            "minlebarkarung"=>$request->input("minlebarkarung"),
            "maxlebarkarung"=>$request->input("maxlebarkarung"),
            "panjangkarung"=>$request->input("panjangkarung"),
            "jarakjahitbawah"=>$request->input("jarakjahitbawah"),
            "jarakjahitatas"=>$request->input("jarakjahitatas"),
            "panjangpolos"=>$request->input("panjangpolos"),
            "minberatkarung"=>$request->input("minberatkarung"),
            "rataberatkarung"=>$request->input("rataberatkarung"),
            "stickjahitbawah"=>$request->input("stickjahitbawah"),
            "anyamanpakan"=>$request->input("anyamanpakan"),
            "anyamanlusi"=>$request->input("anyamanlusi"),
            "warnabenangjahitbawah"=>$request->input("warnabenangjahitbawah"),
            "inner"=>$request->input("inner"),
            "kualitasinner"=>$request->input("kualitasinner"),
            "bahaninner"=>$request->input("bahaninner"),
            "lebarinner"=>$request->input("lebarinner"),
            "minlebarinner"=>$request->input("minlebarinner"),
            "maxlebarinner"=>$request->input("maxlebarinner"),
            "jaraksealbawah"=>$request->input("jaraksealbawah"),
            "jaraksealatas"=>$request->input("jaraksealatas"),
            "panjanginner"=>$request->input("panjanginner"),
            "ketebalan"=>$request->input("ketebalan"),
            "jahitbawahdgkarng"=>$request->input("jahitbawahdgkarng"),
            "jahitultrasonaic"=>$request->input("jahitultrasonaic"),
            "tekukleher"=>$request->input("tekukleher"),
            "minberatinner"=>$request->input("minberatinner"),
            "avgberatinner"=>$request->input("avgberatinner"),
            "minberatouter"=>$request->input("minberatouter"),
            "avgberatouter"=>$request->input("avgberatouter"),
            "note"=>$request->input("note"),
            "satuan"=>$request->input("satuan"),
            "indexharga"=>$request->input("indexharga"),
            "status"=>"Order",
            "created_by"=>$request->input("iduser"),
            "hargaprinting"=>$request->input("hargaprinting")





        ]);
        $specsheet->save();

        return response()->json('Specsheet created!');
    }

    public function updateStatus(Request $request){
        $specsheet=Specsheet::find($request->id);
        $specsheet->update(['status'=>$request->status]);


        return response()->json('Specsheet updated!');
    }

    public function dashboard(){
            $jml=Specsheet::get()->count();
            $selesai=Specsheet::where('status','Done')->count();
            $proses=Specsheet::where('status','Dalam Proses')->count();
            $spk=["jml"=>$jml,"selesai"=>$selesai,"proses"=>$proses];

            return response()->json($spk);

    }
}
