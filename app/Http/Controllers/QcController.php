<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Printing;
use App\Models\Cuttingsewing;
use App\Models\Cuttingsewingqc;
use App\Models\Sewing;
use App\Models\Hotseal;
use App\Models\Pasanginner;
use Illuminate\Support\Facades\DB;

class QcController extends Controller
{

    public function cuttingSewing()
    {
        $tgl = date('Y-m-d', strtotime("-1 month"));
        $cuttingsewing = DB::table('vcuttingsewings')->where('created_at', '>', $tgl)->get();

        return response()->json($cuttingsewing);
    }

    public function printingrtr()
    {
        $printing = DB::table('vprintings')->whereIn('namaalat', ['RTR Baru', 'RTR Lama'])->get();

        return response()->json($printing);
    }

    public function printingsts()
    {
        $printing = DB::table('vprintings')->whereIn('namaalat', ['STS A', 'STS B'])->get();

        return response()->json($printing);
    }


    public function hotsealdata()
    {
        $hotseal = DB::table('vhotseals')->get();

        return response()->json($hotseal);
    }

    public function pasanginnerdata()
    {
        $pasanginner = DB::table('vpasanginners')->get();

        return response()->json($pasanginner);
    }

    public function sewingtanpainner()
    {
        $sewing = DB::table('vsewings')->where('inner', 'no')->get();

        return response()->json($sewing);
    }

    public function sewinginner()
    {
        $sewing = DB::table('vsewings')->where('inner', 'yes')->get();

        return response()->json($sewing);
    }

    public function qccuttingSewingdata()
    {
        $tgl = date('Y-m-d', strtotime("-1 month"));
        $cuttingsewing = DB::table('vcuttingsewingqc')->where('inner', '<>', 'yes')->where('created_at', '>', $tgl)->get();

        return response()->json($cuttingsewing);
    }
    public function qccuttingSewingdatainner()
    {
        $tgl = date('Y-m-d', strtotime("-1 month"));
        $cuttingsewing = DB::table('vcuttingsewingqc')->where('inner', 'yes')->where('created_at', '>', $tgl)->get();

        return response()->json($cuttingsewing);
    }

    public function qcCuttingSewing($mesin)
    {
        $cuttingsewing = Cuttingsewing::where('mesin', $mesin)->orderBy('created_at', 'desc')->first();

        return response()->json($cuttingsewing);
    }

    public function createqcpasanginner(Request $request)
    {
        $pasanginner = new Pasanginner([
            'karu' => $request->karu,
            'qc' => $request->qc,
            'produk' => $request->produk,
            'nomorurut' => $request->nomorurut,
            'tekukleher' => $request->tekukleher,
            'menggantung' => $request->menggantung,
            'shift' => $request->shift
        ]);
        $pasanginner->save();

        return response()->json('pasanginner QC created!');
    }

    public function createqchotseal(Request $request)
    {
        $hotseal = new Hotseal([
            'karu' => $request->karu,
            'qc' => $request->qc,
            'produk' => $request->produk,
            'nomormesin' => $request->nomormesin,
            'dayarekat' => $request->dayarekat,
            'lebartekukan' => $request->lebartekukan,
            'kerataan' => $request->kerataan,
            'antara' => $request->antara,
            'panjangkarung' => $request->panjangkarung,
            'shift' => $request->shift
        ]);
        $hotseal->save();

        return response()->json('hotseal QC created!');
    }

    public function createqcCuttingSewing(Request $request)
    {
        $cuttingsewingqc = new cuttingsewingqc([
            'karu' => $request->karu,
            'qc' => $request->qc,
            'idcuttingsewing' => $request->idcuttingsewing,
            'panjang1' => $request->panjang1,
            'lebar1' => $request->lebar1,
            'ekor1' => $request->ekor1,
            'lipatan1' => $request->lipatan1,
            'jarakjahitan1' => $request->jarakjahitan1,
            'stick10cm1' => $request->stick10cm1,
            'berat1' => $request->berat1,
            'mudahdibuka1' => $request->mudahdibuka1,
            'potonganmiring1' => $request->potonganmiring1,
            'karunglemas1' => $request->karunglemas1,
            'panjanginner1' => $request->panjanginner1,
            'lebarinner1' => $request->lebarinner1,
            'jarakseal1' => $request->jarakseal1,
            'seal1' => $request->seal1,
            'bukaaninner1' => $request->bukaaninner1,
            'potonganinner1' => $request->potonganinner1,
            'menggantung1' => $request->menggantung1,
            'panjang2' => $request->panjang2,
            'lebar2' => $request->lebar2,
            'ekor2' => $request->ekor2,
            'lipatan2' => $request->lipatan2,
            'jarakjahitan2' => $request->jarakjahitan2,
            'stick10cm2' => $request->stick10cm2,
            'berat2' => $request->berat2,
            'mudahdibuka2' => $request->mudahdibuka2,
            'potonganmiring2' => $request->potonganmiring2,
            'karunglemas2' => $request->karunglemas2,
            'panjanginner2' => $request->panjanginner2,
            'lebarinner2' => $request->lebarinner2,
            'jarakseal2' => $request->jarakseal2,
            'seal2' => $request->seal2,
            'bukaaninner2' => $request->bukaaninner2,
            'potonganinner2' => $request->potonganinner2,
            'menggantung2' => $request->menggantung2,
            'shift' => $request->shift

        ]);

        $cuttingsewingqc->save();

        return response()->json('Cutting sewing QC created!');
    }

    public function createqcSewing(Request $request)
    {
        $cuttingsewingqc = new Sewing([
            'produk' => $request->produk,
            'inner' => $request->inner,
            'karu' => $request->karu,
            'qc' => $request->qc,
            'shift' => $request->shift,
            'panjangstd' => $request->panjangstd,
            'lebarstd' => $request->lebarstd,
            'panjang1' => $request->panjang1,
            'lebar1' => $request->lebar1,
            'ekor1' => $request->ekor1,
            'lipatan1' => $request->lipatan1,
            'jarakjahitan1' => $request->jarakjahitan1,
            'stick10cm1' => $request->stick10cm1,
            'berat1' => $request->berat1,
            'mudahdibuka1' => $request->mudahdibuka1,
            'potonganmiring1' => $request->potonganmiring1,
            'karunglemas1' => $request->karunglemas1,
            'panjanginner1' => $request->panjanginner1,
            'lebarinner1' => $request->lebarinner1,
            'jarakseal1' => $request->jarakseal1,
            'seal1' => $request->seal1,
            'bukaaninner1' => $request->bukaaninner1,
            'potonganinner1' => $request->potonganinner1,
            'menggantung1' => $request->menggantung1,
            'panjang2' => $request->panjang2,
            'lebar2' => $request->lebar2,
            'ekor2' => $request->ekor2,
            'lipatan2' => $request->lipatan2,
            'jarakjahitan2' => $request->jarakjahitan2,
            'stick10cm2' => $request->stick10cm2,
            'berat2' => $request->berat2,
            'mudahdibuka2' => $request->mudahdibuka2,
            'potonganmiring2' => $request->potonganmiring2,
            'karunglemas2' => $request->karunglemas2,
            'panjanginner2' => $request->panjanginner2,
            'lebarinner2' => $request->lebarinner2,
            'jarakseal2' => $request->jarakseal2,
            'seal2' => $request->seal2,
            'bukaaninner2' => $request->bukaaninner2,
            'potonganinner2' => $request->potonganinner2,
            'menggantung2' => $request->menggantung2,

        ]);

        $cuttingsewingqc->save();

        return response()->json('Sewing QC created!');
    }

    public function createCuttingSewing(Request $request)
    {
        $cuttingsewing = new Cuttingsewing([
            "mesin" => $request->namamesin,
            "produk" => $request->namaproduk,
            "denier" => $request->denier,
            "lusi" => $request->lusi,
            "pakan" => $request->pakan,
            "lebarstd" => $request->lebarstd,
            "panjangstd" => $request->panjangstd,
            "beratstd" => $request->beratstd,
            "sewing" => $request->sewing,
            "inner" => $request->inner,
            "hotseal" => $request->hotseal,
            "panjanginner" => $request->panjanginner,
            "lebarinner" => $request->lebarinner,
            "mikron" => $request->mikron,
            "beratinner" => $request->beratinner
        ]);

        $cuttingsewing->save();

        return response()->json('Cutting sewing created!');
    }

    public function createPrinting(Request $request)
    {
        $finishing = new Printing([

            "namaqc" => $request->namaqc,
            "namakaru" => $request->namakaru,
            "shift" => $request->shift,
            "namaalat" => $request->namaalat,
            "namaproduk" => $request->namaproduk,
            "noroll" => $request->noroll,
            "tanggalroll" => $request->tanggalroll,
            "beratroll" => $request->beratroll,
            "design" => $request->design,
            "panjang" => $request->panjang,
            "lebar" => $request->lebar,
            "beratkarungstd" => $request->beratkarungstd,
            "beratkarungact" => $request->beratkarungact,
            "tinta1warna" => $request->tinta1warna,
            "tinta1kekentalan" => $request->tinta1kekentalan,
            "tinta2warna" => $request->tinta2warna,
            "tinta2kekentalan" => $request->tinta2kekentalan,
            "tinta3warna" => $request->tinta3warna,
            "tinta3kekentalan" => $request->tinta3kekentalan,
            "tinta4warna" => $request->tinta4warna,
            "tinta4kekentalan" => $request->tinta4kekentalan,
            "tinta5warna" => $request->tinta5warna,
            "tinta5kekentalan" => $request->tinta5kekentalan,
            "tinta6warna" => $request->tinta6warna,
            "tinta6kekentalan" => $request->tinta6kekentalan,
            "tinta7warna" => $request->tinta7warna,
            "tinta7kekentalan" => $request->tinta7kekentalan

        ]);

        $finishing->save();

        return response()->json('Finishing created!');
    }
}
