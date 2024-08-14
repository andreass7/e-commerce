@extends('admin.breadcumb.userBread')
@section('content')
    <div>
        <table class="w-full border py-3 shadow-lg">
            <thead class="border h-10 text-gray-600 bg-green-300">
                <th class="border">No</th>
                <th class="border">Nama</th>
                <th class="border">Email</th>
                <th class="border">No Telepon</th>
            </thead>
            <tbody>
                @foreach ($customers as $index => $customer)
                    <tr class="text-center py-1 h-10 {{ $loop->odd ? '' : 'bg-[#ECFDF3]' }}">
                        <td class="border">{{ $index + 1 }}</td>
                        <td class="border">{{ $customer->name }}</td>
                        <td class="border">{{ $customer->email }}</td>
                        <td class="border">{{ $customer->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
