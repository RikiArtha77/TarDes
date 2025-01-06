<x-home-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-6 bg-white border border-gray-300 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Form Bantuan</h2>
            <form id="bantuanForm" method="POST" action="{{ route('operator.storeBantuan') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-600 font-medium mb-2">Pilih Bantuan (Maksimal 2):</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="choices[]" value="PKH" class="mr-2">
                            <span class="text-gray-600">PKH</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="choices[]" value="PBI" class="mr-2">
                            <span class="text-gray-600">PBI</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="choices[]" value="KIS" class="mr-2">
                            <span class="text-gray-600">KIS</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="choices[]" value="KIP" class="mr-2">
                            <span class="text-gray-600">KIP</span>
                        </label>
                    </div>
                    @error('choices')
                        <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Simpan
                </button>
            </form>
        </div>
    </div>

    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tambahkan Script untuk Notifikasi -->
    <script>
        document.getElementById('bantuanForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Mencegah pengiriman default form

            // Kirim form menggunakan AJAX atau Fetch API jika diperlukan
            const form = this;

            fetch(form.action, {
                method: form.method,
                body: new FormData(form),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                },
            })
                .then(response => {
                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil terkirim!',
                        }).then(() => {
                            window.location.href = "{{ route('landing') }}"; 
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan, coba lagi nanti.',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan, coba lagi nanti.',
                    });
                });
        });
    </script>
</x-home-layout>