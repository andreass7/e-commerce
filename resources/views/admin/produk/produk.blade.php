@extends('admin.breadcumb.productBread')
@section('content')
    <div>
        <div id="openModal" class="w-44 p-2 rounded-lg justify-center border flex hover:bg-green-100 cursor-pointer">
            <button class="font-semibold text-gray-600">Tambah Produk</button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-5 my-auto ms-1 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

        </div>
        <div class="mt-7">
            <table class="w-full border py-3 shadow-lg">
                <thead class="border h-10 text-gray-600 bg-green-300">
                    <th class="border">No</th>
                    <th class="border">Nama Produk</th>
                    <th class="border">Status</th>
                    <th class="border">Harga</th>
                    <th class="border">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr class="text-center border py-1 h-10 {{ $loop->even ? 'bg-[#ECFDF3]' : '' }}">
                            <td class="border">{{ $key + 1 }}</td>
                            <td class="border">{{ $product->name }}</td>
                            <td class="border">{{ $product->status }}</td>
                            <td class="border">{{ $product->price }}</td>
                            <td class="flex justify-center items-center gap-2 py-3">
                                <a href="#" class="flex items-center edit-button" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                    data-status="{{ $product->status }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4 text-blue-700">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center delete-button" data-id="{{ $product->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4 text-red-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4">Tambah Data</h3>
            <form action="{{ route('store.produk') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 p-2" required>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="price" name="price"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 p-2" required>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 px-3 bg-gray-100 appearance-none"
                        required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium" for="file_input">Upload Gambar</label>
                    <input class="block w-full text-sm border border-gray-300 cursor-pointer bg-gray-50" name="image"
                        id="file_input" type="file">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeModal"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    <div id="editModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4">Edit Data</h3>
            <form id="editForm" action="" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="edit_name" name="name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 p-2" required>
                </div>
                <div class="mb-4">
                    <label for="edit_price" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="edit_price" name="price"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 p-2" required>
                </div>

                <div class="mb-4">
                    <label for="edit_status" class="block text-sm font-medium text-gray-700 ">Status</label>
                    <select id="edit_status" name="status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 px-3 bg-gray-100 appearance-none"
                        required>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium " for="edit_file_input">Upload
                        Gambar</label>
                    <input class="block w-full text-sm  border border-gray-300 cursor-pointer bg-gray-50 " name="image"
                        id="edit_file_input" type="file">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeEditModal"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{-- MODAL delete --}}
    <div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4">Hapus Data</h3>
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" id="cancelDelete"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal
                </button>
                <button type="submit" id="confirmDelete"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Hapus
                </button>
            </div>
        </div>
    </div>
@endsection
