<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AmikomEventHub Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-6">
        {{-- Logo & Branding --}}


        {{-- Card Login --}}
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
            <div class="text-center mb-8">
                <div
                    class="w-16 h-16 bg-indigo-900 rounded-2xl flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4 shadow-lg">
                    AH
                </div>
                <h1 class="text-2xl font-black text-slate-900">AmikomEventHub</h1>
                <p class="text-slate-500 font-medium mt-1">Login Admin</p>
            </div>
            {{-- Pesan Error Validasi --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm font-medium">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>{{ $errors->first('email') }}</span>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                {{-- Input Email --}}
                <div class="mb-5">
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            placeholder="admin@amikom.ac.id" required autofocus
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                </div>

                {{-- Input Password --}}
                <div class="mb-6">
                    <label for="password" class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" name="password" id="password" placeholder="Masukkan password Anda"
                            required
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit"
                    class="w-full bg-indigo-900 hover:bg-indigo-800 text-white font-bold py-3 px-6 rounded-xl transition duration-200 shadow-sm">
                    <i class="fa-solid fa-right-to-bracket mr-2"></i>
                    Masuk
                </button>
            </form>
        </div>

        {{-- Footer --}}
        <p class="text-center text-xs text-slate-400 mt-6 font-medium">
            &copy; {{ date('Y') }} AmikomEventHub - Universitas AMIKOM Yogyakarta
        </p>
    </div>

</body>

</html>