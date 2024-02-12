<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Konsultasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            font-weight: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 20px;
            font-weight: 10px;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
            font-size: 14px;
        }

        .text-custom {
            color: #007bff;
            font-weight: bold;
            margin-top: 20px;
            font-size: 16px;
        }

        .fw-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card ml-10 mr-10">
            <div class="card-header">
                Hasil Konsultasi
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <h6 class="text-custom">*) Detail Pasien</h6>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ ucwords($riwayat->nama_pemilik) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid">
                    <h6 class="text-custom">*) Gejala yang dialami</h6>
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diagnosis->gejala_diagnosis as $key => $gejala)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $gejala->kode_gejala }}</td>
                                <td>{{ $gejala->nama_gejala }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid">
                    <h6 class="text-custom">*) Detail Diagnosis Risiko Kehamilan</h6>
                    <table>
                        <tbody>
                            <tr>
                                <td>Tingkat Risiko:</td>
                                <td class="fw-bold">{{ $diagnosis->nama_diagnosis }}</td>
                            </tr>
                            <tr>
                                <td>Persentase dan Nilai Kepercayaan</td>
                                <td class="fw-bold">{!! $diagnosis->persentase_diagnosis !!} / ({{ $diagnosis->nilai_belief }})</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid">
                    <h6 class="text-custom">*) Rekomendasi</h6>
                    <table>
                        <tbody>
                            @foreach (json_decode($solusi->solusi) as $solusi)
                            <tr>
                                <td>{{ $solusi }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
