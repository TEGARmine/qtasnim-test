<?php

namespace App\Http\Livewire\Barang;

use App\Models\Barang;
use Livewire\Component;

class Index extends Component
{

    public $formCreate = false;

    public $barangs = [];
    public $search;
    public $filter;
    public $konsumsi;
    public $pembersih;

    public $tanggalAwal;
    public $tanggalAkhir;


    protected $listeners = ['createBarang'];

    public function createBarang($data)
    {
        if ($data == true) {
            $this->formCreate = false;
        }
    }

    public function resetRentangWaktu()
    {
        $this->tanggalAwal = '';
        $this->tanggalAkhir = '';
    }

    public function delete($idBarang)
    {
        $barang = Barang::find($idBarang);
        $barang->delete();
    }

    public function render()
    {
        $query = Barang::with(['jenisBarang', 'transaksi']);

        $query = $query
            ->when($this->search, function ($q) {
                $q->where(function ($subquery) {
                    $subquery->where('nama_barang', 'like', '%' . $this->search . '%')
                        ->orWhereHas('transaksi', function ($subquery) {
                            $subquery->whereRaw("DATE_FORMAT(tanggal_transaksi, '%d') = ?", [$this->search]);
                        });
                });
            })
            ->when($this->filter, function ($q) {
                $q->orderBy('nama_barang', 'asc');
            })
            ->when($this->konsumsi, function ($q) {
                $q->where('jenisbarang_id', 1);
            })
            ->when($this->pembersih, function ($q) {
                $q->where('jenisbarang_id', 2);
            })
            ->when($this->tanggalAwal, function ($q) {
                $q->whereHas('transaksi', function ($subquery) {
                    $subquery->whereDate('tanggal_transaksi', '>=', $this->tanggalAwal);
                });
            })
            ->when($this->tanggalAkhir, function ($q) {
                $q->whereHas('transaksi', function ($subquery) {
                    $subquery->whereDate('tanggal_transaksi', '<=', $this->tanggalAkhir);
                });
            });

        $this->barangs = $query->get();


        return view('livewire.barang.index');
    }
}
