@extends('admin.breadcumb.index')

@section('content')
    <div>
        <div class="grid grid-cols-4 gap-4">
            <div class="w-auto rounded-lg bg-white border shadow-lg p-5">
                <p class="font-semibold text-lg">Jumlah Produk</p>
                <p class="text-4xl mt-2 text-gray-600 font-bold"><?php echo $productCount; ?></p>
            </div>
            <div class="w-auto rounded-lg bg-white border shadow-lg p-5">
                <p class="font-semibold text-lg">Jumlah Produk Aktif</p>
                <p class="text-4xl mt-2 text-gray-600 font-bold"><?php echo $activeProductCount; ?></p>
            </div>
            <div class="w-auto rounded-lg bg-white border shadow-lg p-5">
                <p class="font-semibold text-lg">Jumlah User</p>
                <p class="text-4xl mt-2 text-gray-600 font-bold"><?php echo $userCount; ?></p>
            </div>
            <div class="w-auto rounded-lg bg-white border shadow-lg p-5">
                <p class="font-semibold text-lg">Jumlah User Aktif</p>
                <p class="text-4xl mt-2 text-gray-600 font-bold"><?php echo $userCount; ?></p>
            </div>
        </div>
        <div class="mt-10">
            <p class="font-semibold text-lg uppercase text-gray-700">daftar Produk Terbaru</p>
            <table class="w-full border mt-4 py-3 shadow-lg">
                <thead class="border h-10 text-gray-600 bg-green-300">
                    <th class="border">No</th>
                    <th class="border">Nama Produk</th>
                    <th class="border">Status</th>
                    <th class="border">Harga</th>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr class="text-center py-1 h-10 {{ $loop->odd ? '' : 'bg-[#ECFDF3]' }}">
                            <td class="border">{{ $index + 1 }}</td>
                            <td class="border">{{ $product->name }}</td>
                            <td class="border">{{ $product->status }}</td>
                            <td class="border">{{ $product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
