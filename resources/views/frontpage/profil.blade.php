<x-home-layout>
    <container>
        <p>Halo, {{ $operator->username }}!</p>
        <div class="shadow px-6 py-4 bg-white rounded sm:px-16 sm:py-16 text-black">
            <div class="container mx-auto">

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="px-2 py-8 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            
                            <div  class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Nama Kepala Keluarga</label>
                                <input type="text" name="nama_kepala_keluarga" placeholder="Nama Kepala Keluarga" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $biodata->nama_kepala_keluarga ?? '' }}" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">NIK</label>
                                <input type="text" name="nik" placeholder="NIK" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $biodata->nik ?? '' }}" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">No. KK</label>
                                <input type="text" name="kk" placeholder="No. KK" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $biodata->kk ?? '' }}" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Jumlah Keluarga</label>
                                <input type="number" name="jumlah_keluarga" placeholder="Jumlah Keluarga" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $dbiodata->jumlah_keluarga ?? '' }}" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="pekerjaan_id" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                <select 
                                    id="pekerjaan_id" 
                                    name="pekerjaan_id"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Pilih Pekerjaan</option>
                                    @foreach ($komunitas as $item)
                                    <option  
                                        {{ ((isset($biodata) && $biodata->pekerjaan_id == $item->pekerjaan_id) || old('pekerjaan_id') == $item->pekerjaan_id) ? 'selected' : '' }}
                                        value="{{ $item->pekerjaan_id }}"> {{ $item->pekerjaan_nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Alamat No. Rumah</label>
                                <textarea name="alamat" required>{{ $biodata->alamat ?? '' }}</textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="komunitas_id" class="block text-sm font-medium text-gray-700">Pilih Kategori</label>
                                <select 
                                    id="komunitas_id" 
                                    name="komunitas_id"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($komunitas as $item)
                                    <option  
                                        {{ ((isset($biodata) && $biodata->komunitas_id == $item->komunitas_id) || old('komunitas_id') == $item->komunitas_id) ? 'selected' : '' }}
                                        value="{{ $item->komunitas_id }}"> {{ $item->komunitas_nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="banjar_id" class="block text-sm font-medium text-gray-700">Banjar</label>
                                <select 
                                    id="banjar_id" 
                                    name="banjar_id"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Pilih Banjar</option>
                                    @foreach ($banjar as $item)
                                    <option  
                                        {{ ((isset($biodata) && $biodata->banjar_id == $item->banjar_id) || old('banjar_id') == $item->banjar_id) ? 'selected' : '' }}
                                        value="{{ $item->banjar_id }}"> {{ $item->banjar_nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="gambar_kk" class="block text-sm font-medium text-gray-700">Foto KK</label>
                            <input 
                                type="file" 
                                name="gambar_kk" 
                                id="gambar_kk"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="gambar_rumah" class="block text-sm font-medium text-gray-700">Foto Rumah</label>
                            <input 
                                type="file" 
                                name="gambar_rumah" 
                                id="gambar_rumah"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                                    <input type="text" id="latitude" name="latitude" value="{{ (isset($biodata)) ? $biodata->latitude : old('latitude') }}" required
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                                    <input type="text" id="longitude" name="longitude" value="{{ (isset($biodata)) ? $biodata->longitude : old('longitude') }}" required
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <!-- Tombol untuk mengambil lokasi -->
                            <div class="col-span-6 sm:col-span-3">
                                <button type="button" id="get-location" 
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md ring bg-indigo-600 hover:bg-indigo-700 text-white">
                                    Get My Location
                                </button>
                            </div>
                            <div class="col-span-6 sm:col-span-3 bg-white sm:px-6 flex justify-end">
                                <button 
                                    type="submit" 
                                    class="inline-flex justify-center w-24 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-indigo-600 hover:bg-indigo-700 text-white">
                                    Save
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </container>
</x-home-layout>