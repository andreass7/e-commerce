<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="p-14">
        <div class="flex flex-col justify-center items-center">
            <h6 class="font-bold text-2xl tracking-wide">
                Halo, Selamat Datang
            </h6>
            <div class="w-96 p-8 mt-10 shadow-lg ring-1 ring-gray-200 rounded-xl bg-white">
                <form class="space-y-6" action="{{ route('store.registrasi') }}" method="post">
                    @csrf
                    <div class="space-y-2">
                        <label for="name" class="text-gray-600 font-semibold">Nama Lengkap</label>
                        <div>
                            <input type="name" name="name" id="name"
                                class="w-full py-1.5 px-2 rounded-lg text-gray-500 bg-gray-100 ring-1 ring-inset ring-gray-200 @error('name') border border-red-500 @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="phone" class="text-gray-600 font-semibold">No Handphone</label>
                        <div>
                            <input type="number" name="phone" id="phone"
                                class="w-full py-1.5 px-2 rounded-lg text-gray-500 bg-gray-100 ring-1 ring-inset ring-gray-200 appearance-none @error('phone') border border-red-500 @enderror"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="email" class="text-gray-600 font-semibold">Email Address</label>
                        <div>
                            <input type="email" name="email" id="email"
                                class="w-full py-1.5 px-2 rounded-lg text-gray-500 bg-gray-100 ring-1 ring-inset ring-gray-200 @error('email') border border-red-500 @enderror"
                                value="{{ old('phone') }}">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="password" class="text-gray-600 font-semibold">Password</label>
                        <div>
                            <input type="password" name="password" id="password"
                                class="w-full py-1.5 px-2 rounded-lg text-gray-500 bg-gray-100 ring-1 ring-inset ring-gray-200 @error('password') border border-red-500 @enderror"
                                value="{{ old('phone') }}">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full py-1.5 rounded-lg bg-green-500 hover:bg-green-700 text-white mt-2">Regristrasi</button>
                    </div>
                    <div class="text-center">
                        <small class="text-sm font-medium text-gray-500">Sudah Punya Akun?<a
                                href="{{ route('front.login') }}"
                                class="font-medium text-sm text-green-500 hover:text-green-700 ms-2">Masuk
                                disini</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
