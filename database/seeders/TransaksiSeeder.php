<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kopi1 = Barang::where('id', 1)->first();
        $transaksiKopi1 = Transaksi::create([
            'barang_id' => $kopi1->id,
            'jumlah_terjual' => 10,
            'tanggal_transaksi' => Carbon::create(2021, 05, 1)
        ]);

        $teh1 = Barang::where('id', 2)->first();
        $transaksiTeh1 = Transaksi::create([
            'barang_id' => $teh1->id,
            'jumlah_terjual' => 19,
            'tanggal_transaksi' => Carbon::create(2021, 05, 5)
        ]);

        $kopi2 = Barang::where('id', 3)->first();
        $transaksiKopi2 = Transaksi::create([
            'barang_id' => $kopi2->id,
            'jumlah_terjual' => 15,
            'tanggal_transaksi' => Carbon::create(2021, 05, 10)
        ]);

        $pastaGigi = Barang::where('id', 4)->first();
        $transaksiPastaGigi = Transaksi::create([
            'barang_id' => $pastaGigi->id,
            'jumlah_terjual' => 20,
            'tanggal_transaksi' => Carbon::create(2021, 05, 11)
        ]);

        $sabunMandi = Barang::where('id', 5)->first();
        $transaksiSabunMandi = Transaksi::create([
            'barang_id' => $sabunMandi->id,
            'jumlah_terjual' => 30,
            'tanggal_transaksi' => Carbon::create(2021, 05, 11)
        ]);

        $sampo = Barang::where('id', 6)->first();
        $transaksiSampo = Transaksi::create([
            'barang_id' => $sampo->id,
            'jumlah_terjual' => 25,
            'tanggal_transaksi' => Carbon::create(2021, 05, 12)
        ]);

        $teh2 = Barang::where('id', 7)->first();
        $transaksiTeh2 = Transaksi::create([
            'barang_id' => $teh2->id,
            'jumlah_terjual' => 5,
            'tanggal_transaksi' => Carbon::create(2021, 05, 12)
        ]);
    }
}
