<?php

namespace App\Http\Livewire\Barang;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Transaksi;
use Livewire\Component;

class Create extends Component
{
    public $jenisBarang = [];
    public $barang;
    public $tanggalTransaksi;
    public $jumlahTerjual;

    protected $rules = [
        'barang.nama_barang' => 'required',
        'barang.stok' => 'required|numeric',
        'barang.jenisbarang_id' => 'required',
    ];

    public function mount()
    {
        $this->jenisBarang = JenisBarang::all();
    }

    public function store()
    {
        $this->validate();

        $barang = Barang::create($this->barang);

        $transaksi = Transaksi::create([
            'barang_id' => $barang->id,
            'jumlah_terjual' => $this->jumlahTerjual,
            'tanggal_transaksi' => $this->tanggalTransaksi
        ]);

        $this->emit('createBarang', true);
    }
    public function render()
    {
        return view('livewire.barang.create');
    }
}
