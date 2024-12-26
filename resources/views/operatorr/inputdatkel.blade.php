<x-operator-layouts>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    </h2>

    <div class="shadow px-6 py-4 bg-white rounded sm:px-16 sm:py-16">
        <div class="container mx-auto">
            <form enctype="multipart/form-data" action="{{ (isset($datkel)) ? route('operator.update', $datkel->datkel_id) : route('operator.store') }}" method="POST">
                @csrf
                @if (isset($datkel))
                    @method('PUT')
                @endif

                <div class="px-2 py-8 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="nama_kpl" class="block text-sm font-medium text-gray-700">Nama Kepala Keluarga</label>
                            <input 
                                type="text" 
                                id="nama_kpl" 
                                name="nama_kpl" 
                                placeholder="Nama Kepala Keluarga" 
                                required 
                                value="{{ (isset($datkel)) ? $datkel->nama_kpl : old('nama_kpl') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            @error('nama_kpl')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="NIK" class="block text-sm font-medium text-gray-700">NIK</label>
                            <input 
                                type="text" 
                                id="NIK" 
                                name="NIK" 
                                placeholder="NIK" 
                                required 
                                value="{{ (isset($datkel)) ? $datkel->NIK : old('NIK') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            @error('NIK')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="Pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                            <input 
                                type="text" 
                                name="Pekerjaan" 
                                id="Pekerjaan" 
                                placeholder="Pekerjaan" 
                                required 
                                value="{{ (isset($datkel))? $datkel->Pekerjaan: old('Pekerjaan') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            @error('Pekerjaan')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="No_KK" class="block text-sm font-medium text-gray-700">No KK</label>
                            <input 
                                type="text" 
                                id="No_KK" 
                                name="No_KK" 
                                placeholder="No_KK" 
                                required 
                                value="{{ (isset($datkel)) ? $datkel->No_KK : old('No_KK') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            @error('No_KK')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="jmh_anggota" class="block text-sm font-medium text-gray-700">Jumlah Anggota Keluarga</label>
                            <input 
                                type="number" 
                                id="jmh_anggota" 
                                name="jmh_anggota" 
                                placeholder="Jumlah Anggota Keluarga" 
                                required 
                                value="{{ (isset($datkel)) ? $datkel->jmh_anggota : old('jmh_anggota') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            @error('jmh_anggota')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="2"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadowsm sm:text-sm border-gray-300 rounded-md">
                            {{(isset($datkel))?$datkel->alamat:old('alamat')}}
                            </textarea>
                            @error('alamat')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="no_rumah" class="block text-sm font-medium text-gray-700">No Rumah</label>
                            <input 
                                type="number" 
                                id="no_rumah" 
                                name="no_rumah" 
                                placeholder="No Rumah" 
                                required 
                                value="{{ (isset($datkel)) ? $datkel->no_rumah : old('no_rumah') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            @error('no_rumah')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="komunitas_id" class="block text-sm font-medium text-gray-700">Komunitas</label>
                            <select 
                                id="komunitas_id" 
                                name="komunitas_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih Komunitas</option>
                                @foreach ($komunitas as $item)
                                <option  
                                    {{ ((isset($datkel) && $datkel->komunitas_id == $item->komunitas_id) || old('komunitas_id') == $item->komunitas_id) ? 'selected' : '' }}
                                    value="{{ $item->komunitas_id }}"> {{ $item->komunitas_nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('komunitas_id')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="gambar_rumah" class="block text-sm font-medium text-gray-700">Foto Rumah</label>
                            <input 
                                type="file" 
                                name="gambar_rumah" 
                                id="gambar_rumah"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            @error('gambar_rumah')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="gambar_kk" class="block text-sm font-medium text-gray-700">Foto KK</label>
                            <input 
                                type="file" 
                                name="gambar_kk" 
                                id="gambar_kk"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            @error('gambar_kk')
                                <div class="text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                                <input type="text" id="latitude" name="latitude" value="{{ (isset($datkel)) ? $datkel->latitude : old('latitude') }}" required
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            
                            <div class="col-span-6 sm:col-span-3">
                                <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                                <input type="text" id="longitude" name="longitude" value="{{ (isset($datkel)) ? $datkel->longitude : old('longitude') }}" required
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            
                            <!-- Tombol untuk mengambil lokasi -->
                            <div class="col-span-2">
                                <button type="button" id="get-location" 
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md ring bg-indigo-600 hover:bg-indigo-700 text-white">
                                    Get My Location
                                </button>
                            </div>                            
                        </div>                                
                    </div>
                </div>

                <hr>

                <!-- Tombol Submit -->
                <div class="px-4 py-3 bg-white text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center w-24 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md ring bg-indigo-600 hover:bg-indigo-700 text-white">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
    {{-- <script>
        CKEDITOR.replace('alamat', {
    toolbar: [
        { name: 'basicstyles', items: ['Bold', 'Italic']}
    ],
});
    </script> --}}
    <script>
        document.getElementById('get-location').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }, function(error) {
                    alert('Geolocation error: ' + error.message);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        });
    </script>
    @endsection
</x-operator-layouts>