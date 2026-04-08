<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentReport;

class IncidentReportController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'tgl_pelaporan' => 'nullable|date',
            'reporter' => 'nullable|string',
            'pin_reporter' => 'nullable|string',
            'tanpa_nama' => 'nullable|string',
            'tglkejadian' => 'nullable|date',
            'devisi' => 'nullable|string',
            'pihak_terlibat' => 'nullable|string',
            'jenislaporan' => 'nullable|string',
            'detailkejadian' => 'nullable|string',
            'lokasi_temuan' => 'nullable|string',
            'kategori_temuan' => 'nullable|string',
            'sifatlaporan' => 'nullable|string',
            'masukanjikaada' => 'nullable|string',
            'menimbulkanpotensi' => 'nullable|string',
            'nominal' => 'nullable|string',
            'bukti_temuan' => 'nullable|string',
            'IRnumber' => 'nullable|string',
        ]);

        $incidentReport = IncidentReport::create($data);

        return response()->json($incidentReport, 201);
    }
}
