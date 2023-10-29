<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $konsumsi = JenisBarang::where('jenis_barang', 'konsumsi')->first();
        $pembersih = JenisBarang::where('jenis_barang', 'pembersih')->first();

        $kopi1 = Barang::create([
            'nama_barang' => 'Kopi',
            'stok' => '100',
            'jenisbarang_id' => $konsumsi->id
        ]);

        $teh1 = Barang::create([
            'nama_barang' => 'Teh',
            'stok' => '100',
            'jenisbarang_id' => $konsumsi->id
        ]);

        $kopi2 = Barang::create([
            'nama_barang' => 'Kopi',
            'stok' => '90',
            'jenisbarang_id' => $konsumsi->id
        ]);

        $pastaGigi = Barang::create([
            'nama_barang' => 'Pasta Gigi',
            'stok' => '100',
            'jenisbarang_id' => $pembersih->id
        ]);

        $sabunMandi = Barang::create([
            'nama_barang' => 'Sabun Mandi',
            'stok' => '100',
            'jenisbarang_id' => $pembersih->id
        ]);

        $sampo = Barang::create([
            'nama_barang' => 'Sampo',
            'stok' => '100',
            'jenisbarang_id' => $pembersih->id
        ]);

        $teh2 = Barang::create([
            'nama_barang' => 'Teh',
            'stok' => '81',
            'jenisbarang_id' => $konsumsi->id
        ]);
    }
}
