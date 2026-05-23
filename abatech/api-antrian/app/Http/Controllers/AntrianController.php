<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AntrianController extends Controller
{
    private $daftarPoli = [
        "001" => "Poli Umum",
        "002" => "Poli Kandungan",
        "003" => "Poli Gigi",
    ];

    public function statusAntrian(Request $request)
    {
        $antrian = Antrian::selectRaw('
            namapoli,
            nomorantrean,
            keluhan,
            (select count(*) from antriansoal) as totalantrean,
            (select count(*) from antriansoal where statusdipanggil = 0) as sisaantrean')
            ->where([
                'kodepoli' => $request->kode_poli,
                'tglpriksa' => $request->tanggalperiksa
            ])
            ->first();

        if (!$antrian) {
            return response()->json([
                'metadata' => [
                    "message" => "Antrian tidak ditemukan",
                    "code" => 201
                ]
            ]);
        }

        return response()->json([
            'response' => [
                "namapoli" => $antrian->namapoli,
                "totalantrean" => $antrian->totalantrean,
                "sisaantrean" => $antrian->sisaantrean,
                "antreanpanggil" => $antrian->nomorantrean,
                "keterangan" => $antrian->keluhan
            ],
            'metadata' => [
                "message" => "OK",
                "code" => 200
            ]
        ]);
    }

    public function ambilAntrian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nomorkartu" => "required|unique:antriansoal",
            "nik" => "required",
            "kodepoli" => "required",
            "tanggalperiksa" => "required",
            "keluhan" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'metadata' => [
                    "message" => $validator->messages(),
                    "code" => 201
                ]
            ]);
        }

        $unqId = sprintf('%03d', rand(1, 999));
        $kodeAntrian = "A" . $unqId;

        $namaPoli = isset($this->daftarPoli[$request->kodepoli]) ? $this->daftarPoli[$request->kodepoli] : null;
        if (!$namaPoli) {
            return response()->json([
                'metadata' => [
                    "message" => "nama poli tidak ditemukan",
                    "code" => 201
                ]
            ]);
        }

        $lastAntrian = Antrian::select('angkaantrean')
            ->where([
                "tglpriksa" => $request->tanggalperiksa,
                "kodepoli" => $request->kodepoli
            ])
            ->whereRaw('angkaantrean = (select max(`angkaantrean`) from antriansoal)')
            ->first();

        $data = [
            "nomorantrean" => $kodeAntrian,
            "angkaantrean" => isset($lastAntrian->angkaantrean) ? $lastAntrian->angkaantrean + 1 : 1,
            "norm" => $unqId,
            "namapoli" => $namaPoli,
            "nomorkartu" => $request->nomorkartu,
            "nik" => $request->nik,
            "kodepoli" => $request->kodepoli,
            "tglpriksa" => $request->tanggalperiksa,
            "keluhan" => $request->keluhan
        ];

        Antrian::insert($data);

        return response()->json([
            'response' => [
                "nomorantrean" => "A12",
                "angkaantrean" => "12",
                "namapoli" => "Poli Umum",
                "sisaantrean" => "4",
                "antreanpanggil" => "A8",
                "keterangan" => "Apabila antrean terlewat harap mengambil antrean kembali."
            ],
            'metadata' => [
                "message" => "OK",
                "code" => 200
            ]
        ]);
    }

    public function sisaAntrian(Request $request)
    {
        $antrian = Antrian::selectRaw("
            (
                SELECT 
                    COUNT(*) 
                FROM antriansoal 
                WHERE statusdipanggil = 0 
                AND kodepoli = '$request->kodepoli'
                AND tglpriksa = '$request->tanggalperiksa'
            ) as sisaantrean,
            nomorantrean,
            namapoli,
            angkaantrean
        ")->first();

        return response()->json([
            'response' => [
                "nomorantrean" => $antrian->nomorantrean,
                "namapoli" => $antrian->namapoli,
                "sisaantrean" => $antrian->sisaantrean,
                "antreanpanggil" => $antrian->angkaantrean,
                "keterangan" => ""
            ],
            'metadata' => [
                "message" => "OK",
                "code" => 200
            ]
        ]);
    }

    public function batalAntrian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nomorkartu" => "required",
            "kodepoli" => "required",
            "tanggalperiksa" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'metadata' => [
                    "message" => $validator->messages(),
                    "code" => 201
                ]
            ]);
        }

        $antrian = Antrian::where([
            "nomorkartu" => $request->nomorkartu,
            "kodepoli" => $request->kodepoli,
            "tglpriksa" => $request->tanggalperiksa,
            "statusdipanggil" => 0
        ])->first();

        if (!$antrian) {
            return response()->json([
                'metadata' => [
                    "message" => "antrian tidak ditemukan",
                    "code" => 201
                ]
            ]);
        }

        $antrian->update(['statusdipanggil' => 1]);

        return response()->json([
            'metadata' => [
                "message" => "OK",
                "code" => 200
            ]
        ]);
    }
}
