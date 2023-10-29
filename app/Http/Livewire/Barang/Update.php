<?php

namespace App\Http\Livewire\Barang;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Transaksi;
use Livewire\Component;

class Update extends Component
{
    public $barang;
    public $transaksi;
    public $jenisBarang = [];

    public $tanggalTransaksi;
    public $jumlahTerjual;

    protected $rules = [
        'barang.nama_barang' => 'required',
        'barang.stok' => 'required|numeric',
        'barang.jenisbarang_id' => 'required',
    ];
    public function mount($id)
    {
        $this->barang = Barang::with(['jenisBarang', 'transaksi'])->where('id', $id)->first();
        $this->jumlahTerjual = $this->barang->transaksi->first()->jumlah_terjual;
        $this->tanggalTransaksi = $this->barang->transaksi->first()->tanggal_transaksi;
        $this->jenisBarang = JenisBarang::all();
        $this->transaksi = $this->barang->transaksi->first();
    }

    public function update()
    {
        $this->validate();

        $this->barang->save();
        $this->transaksi->update([
            'jumlah_terjual' => $this->jumlahTerjual,
            'tanggal_transaksi' => $this->tanggalTransaksi
        ]);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.barang.update');
    }
}
