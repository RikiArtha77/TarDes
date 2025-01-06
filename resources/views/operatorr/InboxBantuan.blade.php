<x-operator-layouts>
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
                                Bantuan</th>
                                <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($bantuan as $key=>$item )
                        <tr>
                            <td>
                                <div class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->operator->username }}</div>
                                </div>
                            </td>
                            <!-- Bantuan -->
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border-b border-gray-200">
                                {{ $item->choices }}
                            </td>
                    
                            <!-- Aksi -->
                            <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                <a href="#"  class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="javascript:void(0);" class="ml-4 text-red-600 hover:text-red-900" onclick="confirmDelete({{ $item->datkel_id }})">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                        
                </table>
            </div>
        </div>
    </div>
</x-operator-layouts>