<div>
    <div class="px-6 py-5">
        <h1 class="text-4xl mb-5 font-bold">Create Barang</h1>
        <form wire:submit.prevent="store">
            <div class="mb-6 flex gap-4">
                <div class="flex-1">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Nama Barang</label>
                    <input wire:model="barang.nama_barang" type="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Barang" required>
                </div>
                <div class="flex-1">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Stok</label>
                    <input wire:model="barang.stok" type="number" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="20" required>
                </div>
            </div>
            <div class="mb-5">
                <select wire:model="barang.jenisbarang_id" class="w-1/2">
                        <option selected>pilih jenis barang</option>
                    @forelse ($jenisBarang as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->jenis_barang }}</option>
                    @empty
                        <option selected>tidak ada jenis barang</option>
                    @endforelse
                </select>
            </div>

            {{-- transaksi --}}
            <div class="mb-6 flex gap-4">
                <div class="flex-1">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Terjual</label>
                    <input wire:model="jumlahTerjual" type="number" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jumlah terjual" required>
                </div>
                <div class="flex-1">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Tanggal  Transaksi</label>
                    <input wire:model="tanggalTransaksi" type="date" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="20" required>
                </div>
            </div>
            <div class="flex items-start">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        // Livewire.on('barangDitambah' => {
        //     Swal.fire(
        //         'Good job!',
        //         'You clicked the button!',
        //         'success'
        //     )
        // })
        // document.addEventListener('livewire:initialized', () => {
        //     // console.log('asda');
        //     Livewire.on('barangDitambah', (event) => {
        //         console.log(event);
        //         if(event) {
        //             Swal.fire(
        //                 'Good job!',
        //                 'You clicked the button!',
        //                 'success'
        //             );
        //         }
        //     });
        // });
        // window.addEventListener('barangDitambah', event => {
        //     console.log(event);
        //     Swal.fire(
        //         'Good job!',
        //         'You clicked the button!',
        //         'success'
        //     );
        // })
    </script>
@endpush