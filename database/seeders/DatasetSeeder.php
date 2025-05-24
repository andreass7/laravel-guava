<?php

namespace Database\Seeders;

use App\Models\Cerita;
use App\Models\Dataset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatasetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ceritaIds = Cerita::pluck('id');
        if ($ceritaIds->isEmpty()) {
        // Tidak ada data cerita, jangan lanjut
            $this->command->warn('Tidak ada data di tabel "ceritas". Seeder datasets dilewati.');
            return;
        }
        $folder = public_path('data');
        // $files = Storage::files($folder);
        $files = array_diff(scandir($folder), ['.', '..']);

        if (empty($files)) {
            $this->command->warn('Tidak ada file ditemukan di /public/data.');
            return;
        } 

        foreach($files as $file){
            $filename = basename($file);
            DB::table('datasets')->insert([
                'filename' => $filename,
                'cerita_id' => $ceritaIds->random(), // bisa diubah nanti kalau mau dikaitkan
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info(count($files) . ' file dimasukkan ke tabel datasets.');

    }
}
