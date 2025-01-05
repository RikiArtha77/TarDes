<x-operator-layouts>
    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-medium text-gray-700">Daftar Keluarga</h3>

        <div class="mt-4">
            <div class="flex flex-wrap -mx-6">
                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                            <svg class="w-8 h-8 text-white" viewBox="0 0 28 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">300</h4>
                            <div class="text-gray-500">Jumlah Seluruh Keluarga Terdaftar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">

        </div>

        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Username</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Nama Kepala Keluarga</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Kategori </th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Banjar</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    No KK</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Alamat</th>
                                    <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($biodata as $key=>$item )
                            <tr>

                                <td>
                                    <div class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->operator->username }}</div>
                                    </div>
                                </td>
                                <!-- Kepala Keluarga -->
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->nama_kepala_keluarga }}</div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm text-gray-900">{{ $item->komunitas->komunitas_nama }}</div>
                                </td>
                        
                                <!-- NIK -->
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $item->banjar->nama_banjar }}</div>
                                </td>
                        
                                <!-- Pekerjaan -->
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-900 border-gray-200">
                                        {{ $item->kk }}
                                    </span>
                                </td>
                        
                                <!-- Alamat -->
                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->alamat }}
                                </td>
                        
                                <!-- Aksi -->
                                <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{ route('operator.edit', $item->id) }}"  class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <a href="javascript:void(0);" class="ml-4 text-red-600 hover:text-red-900" onclick="confirmDelete({{ $item->datkel_id }})">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <!-- SweetAlert JS Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Function for confirmation and deleting the item
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini tidak bisa dikembalikan setelah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batalkan!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send DELETE request using Fetch API
                    fetch(`/operator/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Dihapus!',
                                data.message,
                                'success'
                            ).then(() => {
                                // Reload the page to reflect the deletion
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi masalah saat menghapus data.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat mengirim permintaan.',
                            'error'
                        );
                    });
                } else {
                    Swal.fire(
                        'Dibatalkan',
                        'Data Anda aman :)',
                        'info'
                    );
                }
            });
        }
    </script>
@endsection
</x-operator-layouts>