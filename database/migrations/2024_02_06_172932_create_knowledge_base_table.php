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
        Schema::create('knowledge_base', function (Blueprint $table) {
            $table->id('id_basis_pengetahuan');
            $table->string('kode_diagnosis');
            $table->string('kode_gejala');
            $table->double('nilai_densitas');
            $table->string('gejala')->nullable();
            $table->timestamps();
        });

        $insertedData = [
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G01',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Terlalu muda hamil (<16 tahun)'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G02',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Terlalu lambat hamil, dimana usia perkawinan telah >= 4 tahun'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G03',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Terlalu tua untuk yang pertama kehamilan (>= 35 tahun)'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G04',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Jarak kehamilan 10 bertahun-tahun'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G05',
                'nilai_densitas' => 0.3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Jarak kehamilan <= 2 tahun'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G06',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Memiliki >= 4 anak-anak'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G07',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Terlalu tua untuk hamil (>= 35 tahun)'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G08',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Berusia 16-35 tahun'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G09',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Tubuh pendek (<= 145 cm)'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G10',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Riwayat keguguran'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G11',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Persalinan dengan uri dirogoh'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G11',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Persalinan dengan uri dirogoh'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G12',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Sebelumnya persalinan dengan forsep/vakum'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G13',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Plasenta manual, infus/transfusi'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G14',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Riwayat operasi caesar'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G15',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'diagnosis pada kehamilan (anemia, malaria, TBC, diagnosis jantung, diabetes, IMS)'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G16',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Edema pada kehamilan (wajah dan kaki) dan tekanan darah tinggi'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G16',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Edema pada kehamilan (wajah dan kaki) dan tekanan darah tinggi'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G17',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Kehamilan kembar'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G18',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Hidramnion'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G19',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Kematian fatal intrauterin'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G20',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Tanggal lewat atau kehamilan lebih bulan'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G21',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Posisi sungsang'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G22',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Posisi berbaring melintang'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G23',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Pendarahan selama kehamilan'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G50',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Pernah atau sedang mengalami pre-eklampsia tinggi / eklampsia'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G57',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Memiliki diagnosis menular seksual'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G58',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Kadar urine positif'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G59',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Berat badan kurang dari 45 kg'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G60',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Ukuran lingkar lengan atas kurang dari 23,5 cm'
            ],
            [
                'kode_diagnosis' => 'D03',
                'kode_gejala' => 'G61',
                'nilai_densitas' => 0.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Nilai  HB dibawah 8'
            ],
            [
                'kode_diagnosis' => 'D02',
                'kode_gejala' => 'G62',
                'nilai_densitas' => 0.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => 'Nilai HB di antara 8 hingga 11'
            ],
        ];

        DB::table('knowledge_base')->insert($insertedData);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_base');
    }
};
