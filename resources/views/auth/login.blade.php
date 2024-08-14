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

    <div class="flex h-screen flex-col justify-center items-center p-10">
        <h6 class="font-bold text-2xl tracking-wide">
            Login to Your Account
        </h6>
        <div class="w-96 p-8 mt-10 shadow-lg ring-1 ring-gray-200 rounded-xl bg-white">
            <form class="space-y-6" action="{{ route('auth.login') }}" method="post">
                @csrf
                <div class="space-y-2">
                    <label for="email" class="text-gray-600 font-semibold">Email Address</label>
                    <div>
                        <input type="email" name="email" id="email"
                            class="w-full py-1.5 px-2 rounded-lg text-gray-500 bg-gray-100 ring-1 ring-inset ring-gray-200 @error('email') border border-red-500 @enderror"
                            required value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="password" class="text-gray-600 font-semibold">Password</label>
                    <div>
                        <input type="password" name="password" id="password"
                            class="w-full py-1.5 px-2 rounded-lg text-gray-500 bg-gray-100 ring-1 ring-inset ring-gray-200 @error('email') border border-red-500 @enderror"
                            required>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="text-end">
                    <small><a href="" class="font-medium text-sm text-green-500 hover:text-green-600">Lupa
                            Password?</a></small>
                </div>
                <div>
                    <button type="submit"
                        class="w-full py-1.5 rounded-lg bg-green-500 hover:bg-green-700 text-white">Login</button>
                </div>
                <div class="text-center">
                    <small class="text-sm font-medium text-gray-500">Belum Punya Akun?<a
                            href="{{ route('auth.registrasi') }}"
                            class="font-medium text-sm text-green-500 hover:text-green-700 ms-2">Daftar
                            disini</a></small>
                </div>
            </form>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</body>

</html>
