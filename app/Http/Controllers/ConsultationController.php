<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use App\Models\History;
use App\Models\KnowledgeBase;
use App\Models\Symptom;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    //
    public function index()
    {
        $datas = [
            'titlePage' => 'Konsultasi',
            'navLink' => 'konsultasi',
            'dataGejala' => Symptom::all()
        ];

        return view('user.konsultasi', $datas);
    }

    public function showdata($id_konsultasi)
    {
        $dataKonsultasi = History::find($id_konsultasi)->toArray();

        $dataTampilan = [
            'titlePage' => 'Hasil Konsultasi',
            'navLink' => 'konsultasi',
            'namaPemilik' => $dataKonsultasi['nama_pemilik'],
            'diagnosis' => json_decode($dataKonsultasi['diagnosis']),
            'solusi' => json_decode($dataKonsultasi['solusi'])
        ];

        return view('user.hasilKonsultasi', $dataTampilan);
    }

    public function kalkulator(Request $request)
    {
        $validateReq = $request->validate([
            'nama_pemilik' => 'required',
        ]);

        $arrHasilUser = $request->input('resultGejala');

        if ($arrHasilUser == null) {
            return back()->withInput()->with('error', 'Anda belum memilih gejala');
        } else {
            // if (count($arrHasilUser) < Diagnose::count() + 1) {
                // return back()->withInput()->with('error', 'Minimal gejala yang dipilih adalah ' . (Diagnose::count() + 1) . ' gejala');
            if (count($arrHasilUser) > 1) {
                // } else {
                // foreach ($arrHasilUser as $key => $value) {
                //     $dataPenyakit[$key] = BasisPengetahuan::where('kode_gejala', $value)
                //         ->select('kode_penyakit')
                //         ->get()
                //         ->toArray();
                //     foreach ($dataPenyakit[$key] as $a => $b) {
                //         $resultData[$key]['daftar_penyakit'][$a] = $b['kode_penyakit'];
                //     }
                //     $dataNilaiDensitas[$key] = Gejala::where('kode_gejala', $value)
                //         ->select('nilai_densitas', 'gejala')
                //         ->get()
                //         ->toArray();
                //     $dataGejala[$key] = $dataNilaiDensitas[$key][0]['gejala'];
                //     $resultData[$key]['belief'] = $dataNilaiDensitas[$key][0]['nilai_densitas'];
                //     $resultData[$key]['plausibility'] = 1 - $dataNilaiDensitas[$key][0]['nilai_densitas'];
                // }

                foreach ($arrHasilUser as $key => $value) {
                    $dataDiagnosis[$key] = KnowledgeBase::where('kode_gejala', $value)
                        ->select('kode_diagnosis')
                        ->get()
                        ->toArray();
                    foreach ($dataDiagnosis[$key] as $a => $b) {
                        $resultData[$key]['daftar_diagnosis'][$a] = $b['kode_diagnosis'];
                    }

                    $dataNilaiDensitas[$key] = KnowledgeBase::where('kode_gejala', $value)
                        ->select('nilai_densitas', 'kode_gejala', 'kode_diagnosis', 'gejala')
                        ->get()
                        ->toArray();
                    $dataGejala[$key] = $dataNilaiDensitas[$key][0]['gejala'];
                    $resultData[$key]['belief'] = $dataNilaiDensitas[$key][0]['nilai_densitas'];
                    $resultData[$key]['plausibility'] = 1 - $dataNilaiDensitas[$key][0]['nilai_densitas'];
                }

                $variabelTampilan = $this->mulaiPerhitungan($resultData);

                foreach ($dataGejala as $key => $value) {
                    $variabelTampilan['Gejala_Diagnosis'][$key]['kode_gejala'] = $arrHasilUser[$key];
                    $variabelTampilan['Gejala_Diagnosis'][$key]['nama_gejala'] = $value;
                }

                $konsultasiSavedData = [
                    'nama_diagnosis' => $variabelTampilan['Nama_Diagnosis']['nama_diagnosis'],
                    'nilai_belief' => $variabelTampilan['Nilai_Belief_Diagnosis'],
                    'persentase_diagnosis' => $variabelTampilan['Persentase_Diagnosis'],
                    'gejala_diagnosis' => $variabelTampilan['Gejala_Diagnosis']
                ];

                $konsultasi = new History();
                $konsultasi->nama_pemilik = $validateReq['nama_pemilik'];
                $konsultasi->diagnosis = json_encode($konsultasiSavedData);
                $konsultasi->solusi = json_encode($variabelTampilan['Solusi_Diagnosis']);
                $konsultasi->user_id = auth()->user()->id;
                $konsultasi->save();
                $idKonsultasi = $konsultasi->id_riwayat;

                return redirect()->to('konsultasi/' . $idKonsultasi);
            }
        }
    }

    public function mulaiPerhitungan($dataAcuan)
    {
        $x = 0;
        for ($i = 0; $i < count($dataAcuan); $i++) {
            $hasilKonversi[$i]['data'][0]['array'] = $dataAcuan[$i]['daftar_diagnosis'];
            $hasilKonversi[$i]['data'][0]['value'] = $dataAcuan[$i]['belief'];
            $hasilKonversi[$i]['data'][1]['array'] = [];
            $hasilKonversi[$i]['data'][1]['value'] = $dataAcuan[$i]['plausibility'];

            $x++;
        }

        $result = $this->startingPoint(count($hasilKonversi) - 2, $hasilKonversi);

        $arrResult = [];
        foreach ($result['data'] as $key => $value) {
            $arrResult[$key] = $value['value'];
        }

        $indexMaxValue = array_search(max($arrResult), $arrResult);
        $nilaiBelief = round($result['data'][$indexMaxValue]['value'], 2);
        $persentase = (round($result['data'][$indexMaxValue]['value'], 2) * 100) . " %";

        $kodeDiagnosis = $result['data'][$indexMaxValue]['array'][0];
        $dataDiagnosis = Diagnose::where('kode_diagnosis', $kodeDiagnosis)
            ->select('nama_diagnosis')
            ->get()
            ->toArray()[0];
        $dataSolusi = Diagnose::where('kode_diagnosis', $kodeDiagnosis)
            ->select('solusi')
            ->get()
            ->toArray()[0];

        $jsonData = [
            'Nama_Diagnosis' => $dataDiagnosis,
            'Nilai_Belief_Diagnosis' => $nilaiBelief,
            'Persentase_Diagnosis' => $persentase,
            'Solusi_Diagnosis' => $dataSolusi,
        ];

        return $jsonData;
    }

    public function startingPoint(int $jumlah, array $myData, $data = [], int $indeks = 0)
    {
        if (count($data) == 0) {
            $hasilAkhir = $this->kalkulatorPerhitungan($myData[$indeks], $myData[$indeks + 1]);
        } else {
            $hasilAkhir = $this->kalkulatorPerhitungan($data, $myData[$indeks + 1]);
        }

        if ($indeks < $jumlah) {
            return $this->startingPoint($jumlah, $myData, $hasilAkhir, $indeks + 1);
        } else {
            return $hasilAkhir;
        }
    }

    public function kalkulatorPerhitungan($array1, $array2)
    {
        $hasilAkhir['data'] = [];

        $hasilSementara = [];
        $z = 0;
        for ($x = 0; $x < count($array1['data']); $x++) {
            for ($y = 0; $y < count($array2['data']); $y++) {
                if (count($array1['data'][$x]['array']) != 0 && count($array2['data'][$y]['array']) != 0) {
                    $hasilSementara[$z]['array'] = json_encode(array_values(array_intersect($array1['data'][$x]['array'], $array2['data'][$y]['array'])));
                    if (count(json_decode($hasilSementara[$z]['array'])) == 0) {
                        $hasilSementara[$z]['status'] = "Himpunan Kosong";
                    }
                } else {
                    $hasilSementara[$z]['array'] = json_encode(array_merge($array1['data'][$x]['array'], $array2['data'][$y]['array']));
                }
                $hasilSementara[$z]['value'] = $array1['data'][$x]['value'] * $array2['data'][$y]['value'];
                $z++;
            }
        }

        $pushArray = [];
        foreach ($hasilSementara as $hasil) {
            array_push($pushArray, $hasil['array']);
        }

        $pushArrayCat = [];
        foreach (array_count_values($pushArray) as $key => $value) {
            array_push($pushArrayCat, $key);
        }

        $tetapan = 0;
        foreach ($hasilSementara as $datahasil) {
            if (isset($datahasil['status']) && $datahasil['status'] == "Himpunan Kosong") {
                $tetapan += $datahasil['value'];
            }
        }

        $tetapan = 1 - $tetapan;

        $finalResult = [];
        for ($y = 0; $y < count($pushArrayCat); $y++) {
            $decode[$y] = json_decode($pushArrayCat[$y]);
            $finalResult[$y]['array'] = $decode[$y];
            $finalResult[$y]['value'] = 0;
            for ($x = 0; $x < count($hasilSementara); $x++) {
                $array[$x] = json_decode($hasilSementara[$x]['array']);
                if ($decode[$y] == $array[$x]) {
                    if (!isset($hasilSementara[$x]['status'])) {
                        $finalResult[$y]['value'] += $hasilSementara[$x]['value'];
                    }
                }
            }
            $finalResult[$y]['value'] = $finalResult[$y]['value'] / $tetapan;
        }

        for ($i = 0; $i < count($finalResult); $i++) {
            $hasilAkhir['data'][$i] = $finalResult[$i];
        }

        return $hasilAkhir;
    }
}
