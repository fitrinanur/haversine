<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('settings')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $settings = [
            [
                'vision' => 'Terwujudnya Yogyakarta sebagai salah satu destinasi terkemuka di Asia Tenggara pada
                tahun 2025 berdasarkan keunggulan produk wisata yang berkualitas, berwawasan budaya,
                berwawasan lingkungan, berkelanjutan dan menjadi salah satu pendorong tumbuhnya ekonomi
                kerakyatan.',
                'mission_1' => 'Mewujudkan destinasi pariwisata DIY yang berbasis budaya, lingkungan, kreatif dan
                inovatif, maju berkembang dan mampu menggerakan peningkatan perekonomian masyarakat
                yang berkelanjutan.',
                'mission_2' => 'Mewujudkan destinasi pariwisata DIY yang berbasis budaya, lingkungan, kreatif dan
                inovatif, maju berkembang dan mampu menggerakan peningkatan perekonomian masyarakat
                yang berkelanjutan.'
            ],
        ];

        \App\Setting::insert($settings);
    }
}
