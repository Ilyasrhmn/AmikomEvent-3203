<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 sticky top-0 h-screen">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                AH</div>
            <span class="text-xl font-bold text-white tracking-tight">AmikomEventHub</span>
        </div>

        <nav class="flex-1 space-y-2">
            <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">Main Menu</p>
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <i class="fa-solid fa-table-cells-large w-5 h-5 text-center"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.events.index') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.events.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <i class="fa-solid fa-calendar w-5 h-5 text-center group-hover:text-indigo-300"></i>
                Kelola Event
            </a>
            <a href="{{ route('admin.categories.index') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <i class="fa-solid fa-tags w-5 h-5 text-center"></i>
                Kelola Kategori
            </a>
            <a href="{{ route('admin.transactions.index') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.transactions.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <i class="fa-solid fa-chart-simple w-5 h-5 text-center"></i>
                Laporan Transaksi
            </a>
            <!-- Partner -->
            <a href="{{ route('admin.partners.index') }}" 
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.partners.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <i class="fa-solid fa-handshake w-5 h-5 text-center"></i>
                Kelola Partner
            </a>
        </nav>

        <div class="pt-6 border-t border-indigo-800">
            <div class="px-4 py-2 mb-2">
                <p class="text-xs text-indigo-400 font-medium">Login sebagai:</p>
                <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name }}</p>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white transition font-medium w-full text-left">
                    <i class="fa-solid fa-arrow-right-from-bracket text-center"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 overflow-y-auto">
        @yield('content')
    </main>

</body>

</html>
