<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('symptom', function (Blueprint $table) {
            $table->id('id_gejala');
            $table->string('kode_gejala')->unique();
            $table->string('gejala');
            $table->timestamps();
        });

        $insertedData = [
            [
                'kode_gejala' => 'G01',
                'gejala' => 'Terlalu muda hamil (<16 tahun)',
                // 'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G02',
                'gejala' => 'Terlalu lambat hamil, dimana usia perkawinan telah >= 4 tahun',
                // 'nilai_densitas' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G03',
                'gejala' => 'Terlalu tua untuk yang pertama kehamilan (>= 35 tahun)',
                // 'nilai_densitas' => 0.4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G04',
                'gejala' => 'Jarak kehamilan 10 bertahun-tahun',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G05',
                'gejala' => 'Jarak kehamilan <= 2 tahun',
                // 'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G06',
                'gejala' => 'Memiliki >= 4 anak-anak',
                // 'nilai_densitas' => 0.3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G07',
                'gejala' => 'Terlalu tua untuk hamil (>= 35 tahun)',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G08',
                'gejala' => 'Berusia 16-35 tahun',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G09',
                'gejala' => 'Tubuh pendek (<= 145 cm)',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G10',
                'gejala' => 'Riwayat keguguran',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G11',
                'gejala' => 'Persalinan dengan uri dirogoh',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G12',
                'gejala' => 'Sebelumnya persalinan dengan forsep/vakum',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G13',
                'gejala' => 'Plasenta manual, infus/transfusi',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G14',
                'gejala' => 'Riwayat operasi caesar',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G15',
                'gejala' => 'Penyakit pada kehamilan (anemia, malaria, TBC, penyakit jantung, diabetes, IMS)',
                // 'nilai_densitas' => 0.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G16',
                'gejala' => 'Edema pada kehamilan (wajah dan kaki) dan tekanan darah tinggi',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G17',
                'gejala' => 'Kehamilan kembar',
                // 'nilai_densitas' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G18',
                'gejala' => 'Hidramnion',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G19',
                'gejala' => 'Kematian fatal intrauterin',
                // 'nilai_densitas' => 0.3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G20',
                'gejala' => 'Tanggal lewat atau kehamilan lebih bulan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G21',
                'gejala' => 'Posisi sungsang',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G22',
                'gejala' => 'Posisi berbaring melintang',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G23',
                'gejala' => 'Pendarahan selama kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G24',
                'gejala' => 'Tekanan sistolik di bawah 130',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G25',
                'gejala' => 'Tekanan sistolik di antara 130 hingga 150',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G26',
                'gejala' => 'Tekanan sistolik di atas 150',
                // 'nilai_densitas' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G27',
                'gejala' => 'Tekanan diastolik di bawah 80',
                // 'nilai_densitas' => 0.3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G28',
                'gejala' => 'Tekanan diastolik di antara 80 - 90',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G29',
                'gejala' => 'Tekanan diastolik di atas 90',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G30',
                'gejala' => 'Kadar glukosa di bawah 140',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G31',
                'gejala' => 'Kadar glukosa di antara 140-200',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G32',
                'gejala' => 'Kadar glukosa di atas 200',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G33',
                'gejala' => 'Suhu tubuh di bawah 36 derajat Celcius',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G34',
                'gejala' => 'Suhu tubuh di antara 36-37,5 derajat Celcius',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G35',
                'gejala' => 'Suhu tubuh di atas 37,5 derajat Celcius',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G36',
                'gejala' => 'Detak jantung di bawah 90 pada Minggu ke 5-7 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G37',
                'gejala' => 'Detak jantung di antara 90 hingga 110 pada Minggu ke 5-7 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G38',
                'gejala' => 'Detak jantung di atas 110 pada Minggu ke 5-7 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G39',
                'gejala' => 'Detak jantung di bawah 149 pada Minggu ke 8-12 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G40',
                'gejala' => 'Detak jantung di antara 149 hingga 170 pada Minggu ke 8-12 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G41',
                'gejala' => 'Detak jantung di atas 170 pada Minggu ke 8-12 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G42',
                'gejala' => 'Detak jantung di bawah 110 pada Minggu ke 13-26 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G43',
                'gejala' => 'Detak jantung di antara 110 hingga 160 pada Minggu ke 13-26 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G44',
                'gejala' => 'Detak jantung di atas 160 pada Minggu ke 13-26 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G45',
                'gejala' => 'Detak jantung di bawah 110 pada Minggu ke 27-40 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G46',
                'gejala' => 'Detak jantung di antara 110 hingga 160 pada Minggu ke 27-40 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G47',
                'gejala' => 'Detak jantung di atas 160 pada Minggu ke 27-40 kehamilan',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G48',
                'gejala' => 'Pernah atau sedang mengalami pre-eklampsia rendah',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G49',
                'gejala' => 'Pernah atau sedang mengalami pre-eklampsia sedang',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G50',
                'gejala' => 'Pernah atau sedang mengalami pre-eklampsia tinggi / eklampsia',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G51',
                'gejala' => 'Kadar urine di bawah 5',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G52',
                'gejala' => 'Kadar urine berada di antara 5 hingga 8',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G53',
                'gejala' => 'Kadar urine di atas 8',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G54',
                'gejala' => 'Memiliki penyakit asma / sesak napas',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G55',
                'gejala' => 'Pernah operasi laparatomi',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G56',
                'gejala' => 'Pernah operasi tulang',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G57',
                'gejala' => 'Memiliki penyakit menular seksual',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G58',
                'gejala' => 'Kadar urine positif',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G59',
                'gejala' => 'Berat badan kurang dari 45 kg',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G60',
                'gejala' => 'Ukuran lingkar lengan atas kurang dari 23,5 cm',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G61',
                'gejala' => 'Nilai  HB dibawah 8',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G62',
                'gejala' => 'Nilai HB di antara 8 hingga 11',
                // 'nilai_densitas' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('symptom')->insert($insertedData);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('symptom');
    }
};
