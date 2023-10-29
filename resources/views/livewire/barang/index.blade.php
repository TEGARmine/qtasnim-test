<div>
    <div class="relative shadow-md sm:rounded-lg">
        <button wire:click="$toggle('formCreate')" class="ml-6 mt-5 px-4 py-2 rounded-xl text-blue-600 bg-green-200">{{ $formCreate ? 'Show Barang' : 'Create Barang' }}</button>
        @if ($formCreate)
            <livewire:barang.create />
        @endif
        @if (!$formCreate)
            <div x-data="{ filter: false }" class="flex items-center px-6 py-5 justify-between pb-4 bg-white">
                <div>
                    <button @click="filter=!filter" class="bg-blue-500 px-4 rounded-xl text-white">Filter</button>
                    <div x-cloak x-show="filter" class="bg-white mt-1 px-[30px] py-2 shadow-2xl border ">
                        <div class="flex items-center gap-4">
                            <input wire:model="filter" value="nama_barang" type="checkbox">
                            <span>Nama</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <input wire:model="konsumsi" value="konsumsi" type="checkbox">
                            <span>konsumsi</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <input wire:model="pembersih" value="pembersih" type="checkbox">
                            <span>pembersih</span>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>rentang waktu</div>
                            <button wire:click="resetRentangWaktu" class="text-[red]">clear</button>
                        </div>
                        <div class="flex items-center gap-4">
                            <div>
                                <input wire:model="tanggalAwal" type="date">
                            </div>
                            <span>sampai</span>
                            <div>
                                <input wire:model="tanggalAkhir" type="date">
                            </div>
                        </div>
                    </div>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input wire:model.debounce.1000ms="search" type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search barang">
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stok
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Terjual
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Transaksi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $barang)
                        <tr class="bg-white hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-6">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <div class="text-base font-semibold">{{ $barang->nama_barang }}</div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $barang->stok }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $barang->transaksi->first()->jumlah_terjual }}
                            </td>
                            <td class="px-6 py-4">
                                {{ date('d-m-Y', strtotime($barang->transaksi->first()->tanggal_transaksi)) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $barang->jenisBarang->jenis_barang }}
                            </td>
                            <th class="flex gap-4 px-6 py-4">
                                <a href="{{ route('edit', ['id' => $barang->id]) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                <button wire:click="delete({{ $barang->id }})" class="font-medium text-blue-600 hover:underline">Delete</button>
                            </th>
                        </tr>
                        <tr></tr>
                    @empty
                </tbody>
            </table>
                <div class="py-4 text-center">Tidak ada barang</div>
                @endforelse
        @endif
    </div>
        
</div>
    