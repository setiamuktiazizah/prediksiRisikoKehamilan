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
        Schema::create('diagnose', function (Blueprint $table) {
            $table->id('id_diagnosis');
            $table->string('kode_diagnosis')->unique();
            $table->string('nama_diagnosis');
            $table->longText('solusi');
            $table->timestamps();
        });

        $insertedData = [
            [
                'kode_diagnosis' => 'D01',
                'nama_diagnosis' => 'Rendah',
                'solusi' => json_encode([
                    '- Tetapkan janji temu rutin dengan dokter kandungan untuk pemeriksaan prenatal dan perawatan kehamilan berkala; ',
                    '- Lanjutkan dengan pola makan yang seimbang dan olahraga ringan untuk menjaga kesehatan Anda dan perkembangan janin;',
                    '- Pastikan untuk mengonsumsi asam folat dan nutrisi penting lainnya sesuai dengan rekomendasi dokter;',
                    '- Pemantauan kondisi kesehatan secara berkala dan konsultasi dengan dokter jika ada perubahan atau gejala yang mencurigakan.'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_diagnosis' => 'D02',
                'nama_diagnosis' => 'Sedang',
                'solusi' => json_encode([
                    '- Perhatikan dan patuhi saran dokter kandungan terkait perawatan kehamilan;',
                    '- Kurangi aktivitas fisik yang berisiko dan hindari situasi stres yang berlebihan;',
                    '- Pertimbangkan untuk mengikuti kelas prenatal atau mendapatkan dukungan konseling jika diperlukan;',
                    '- Pantau tanda-tanda peringatan seperti pendarahan, nyeri, atau gejala yang tidak biasa dan beritahu dokter segera.'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_diagnosis' => 'D03',
                'nama_diagnosis' => 'Tinggi',
                'solusi' => json_encode([
                    '- Lakukan perubahan signifikan dalam gaya hidup dan aktivitas sesuai dengan rekomendasi dokter kandungan;',
                    '- Mungkin diperlukan rawat inap di rumah sakit atau pemantauan yang lebih ketat;',
                    '- Perlu pemantauan medis yang lebih intensif untuk memantau kesehatan ibu dan janin;',
                    '- Pemantauan terus-menerus dan perawatan yang lebih intensif selama kehamilan, dan kemungkinan persalinan operasi caesar jika dianggap perlu.'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('diagnose')->insert($insertedData);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnose');
    }
};
