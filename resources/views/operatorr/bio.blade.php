<x-operator-layouts>
    <div class="shadow px-6 py-4 bg-white rounded sm:px-16 sm:py-16 text-black">
        <div class="container mx-auto">
            <form action="{{ (isset($biodata)) ? route('operator.update', $biodata->id) : route('operator.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="px-2 py-8 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <!-- Nama Kepala Keluarga -->
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Nama Kepala Keluarga</label>
                            <input type="text" name="nama_kepala_keluarga" placeholder="Nama Kepala Keluarga" 
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                value="{{ (isset($biodata)) ? $biodata->nama_kepala_keluarga : old('nama_kepala_keluarga') }}">
                        </div>
                        <!-- NIK -->
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">NIK</label>
                            <input type="text" name="nik" placeholder="NIK" 
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                value="{{ (isset($biodata)) ? $biodata->nik : old('nik') }}">
                        </div>
                        <!-- No. KK -->
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">No. KK</label>
                            <input type="text" name="kk" placeholder="No. KK" 
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                value="{{ (isset($biodata)) ? $biodata->kk : old('kk') }}">
                        </div>
                        <!-- Jumlah Keluarga -->
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Jumlah Anggota</label>
                            <input type="number" name="jumlah_anggota" placeholder="Jumlah Anggota" 
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                value="{{ (isset($biodata)) ? $biodata->jumlah_anggota : old('jumlah_anggota') }}">
                        </div>
                        <!-- Pekerjaan -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="pekerjaan_id" class="block text-sm font-medium text-gray-700">Pilih Pekerjaan</label>
                            <select id="pekerjaan_id" name="pekerjaan_id" 
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih Pekerjaan</option>
                                @foreach ($pekerjaan as $item)
                                <option  
                                {{ ((isset($biodata) && $biodata->pekerjaan_id == $item->pekerjaan_id) || old('pekerjaan_id') == $item->pekerjaan_id) ? 'selected' : '' }}
                                value="{{ $item->pekerjaan_id }}"> {{ $item->nama_pekerjaan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Alamat -->
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea name="alamat" id="alamat"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                {{(isset($biodata))?$biodata->alamat:old('alamat')}}
                            </textarea>
                        </div>
                        <!-- Kategori -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="komunitas_id" class="block text-sm font-medium text-gray-700">Pilih Kategori</label>
                            <select id="komunitas_id" name="komunitas_id" 
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih Kategori</option>
                                @foreach ($komunitas as $item)
                                <option  
                                {{ ((isset($biodata) && $biodata->komunitas_id == $item->komunitas_id) || old('komunitas_id') == $item->komunitas_id) ? 'selected' : '' }}
                                value="{{ $item->komunitas_id }}"> {{ $item->komunitas_nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Banjar -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="banjar_id" class="block text-sm font-medium text-gray-700">Banjar</label>
                            <select id="banjar_id" name="banjar_id" 
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih Banjar</option>
                                @foreach ($banjar as $item)
                                <option  
                                {{ ((isset($biodata) && $biodata->banjar_id == $item->banjar_id) || old('banjar_id') == $item->banjar_id) ? 'selected' : '' }}
                                value="{{ $item->banjar_id }}"> {{ $item->nama_banjar }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Foto KK -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="foto_kk" class="block text-sm font-medium text-gray-700">Foto KK</label>
                            <input type="file" name="foto_kk" id="foto_kk"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <!-- Foto Rumah -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="foto_rumah" class="block text-sm font-medium text-gray-700">Foto Rumah</label>
                            <input type="file" name="foto_rumah" id="foto_rumah"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div id="map" style="height: 400px;" class="col-span-6 sm:col-span-6"></div>

                        <!-- Latitude & Longitude -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                            <input type="text" id="latitude" name="latitude" required pattern="^-?\d+(\.\d+)?$"
                                value="{{ (isset($biodata)) ? $biodata->latitude : old('latitude') }}" 
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                            <input type="text" id="longitude" name="longitude" required pattern="^-?\d+(\.\d+)?$"
                                value="{{ (isset($biodata)) ? $biodata->longitude : old('longitude') }}" 
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>                        
                            <button type="submit" 
                                class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md shadow-sm">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>            
        </div>
    </div>

    @section('scripts')
    <script>
        CKEDITOR.replace('alamat', {
    toolbar: [
        { name: 'basicstyles', items: ['Bold', 'Italic']}
        ],
    });
    </script>
       <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the latitude and longitude from the database (if available)
            let latitude = {{ isset($biodata) && $biodata->latitude ? $biodata->latitude : '-8.65' }}; // Default to -8.65 if not set
            let longitude = {{ isset($biodata) && $biodata->longitude ? $biodata->longitude : '115.22' }}; // Default to 115.22 if not set

            // Initialize map with the coordinates
            const map = L.map('map').setView([latitude, longitude], 13); // Set view to the latitude and longitude

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors',
            }).addTo(map);

            // Initialize the marker at the coordinates from the database
            const marker = L.marker([latitude, longitude], { draggable: true }).addTo(map);

            // Update latitude and longitude when marker is dragged
            marker.on('dragend', function (event) {
                const position = marker.getLatLng();
                document.getElementById('latitude').value = position.lat;
                document.getElementById('longitude').value = position.lng;
            });

            // Update marker position when map is clicked
            map.on('click', function (e) {
                const { lat, lng } = e.latlng;
                marker.setLatLng([lat, lng]);
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            });
        });
    </script>         
    @endsection
</x-operator-layouts>