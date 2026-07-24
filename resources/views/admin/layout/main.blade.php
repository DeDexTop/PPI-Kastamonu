<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('img/Logo ppi.png') }}">
    @stack('styles')
    <style>
        .sidebar {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 240px;
            background: #fdfdfd; /* dark sidebar */
        }

        .sidebar .nav-item a {
            display: block;
            padding: 12px 16px;
            color: #000000;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease;
            border-radius: 15px;
        }

        .sidebar .nav-item a:hover {
            background: #93bcff;
            color: #fff;
        }

        /* ACTIVE STATE */
        .sidebar .nav-item.active a {
            background: #2563eb; /* biru */
            color: #fff;
            font-weight: 600;
            border-radius: 15px;
        }

        .sidebar .nav-item.active a:hover {
            background: #1e40af; /* biru lebih gelap saat hover */
            color: #fff;
        }

    </style>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg sidebar">
        <div class="p-6 text-xl font-bold border-b"><a href="/">Admin Kastam</a></div>
        <nav class="p-4 space-y-2">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item {{ Request::is('admin/activity') ? 'active' : '' }}">
                <a href="/admin/activity">Aktivitas</a>
            </li>
            <li class="nav-item {{ Request::is('admin/penulisan') ? 'active' : '' }}">
                <a href="/admin/penulisan">Penulisan</a>
            </li>
            <li class="nav-item {{ Request::is('admin/cabinets') ? 'active' : '' }}">
                <a href="/admin/cabinets">Kabinet</a>
            </li>
            <li class="nav-item {{ Request::is('admin/blog') ? 'active' : '' }}">
                <a href="/admin/blog">Blog</a>
            <form method="POST" action="/logout">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 rounded text-red-500 hover:bg-red-50" style="border-radius:15px">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <!-- Header -->
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Dashboard</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">{{ auth()->user()->nama }}</span>
                <img src="{{ asset('img/Logo ppi.png') }}"s class="rounded-full" alt="avatar" style="width:40px; height:40px;">
            </div>
        </header>

        @yield('containers')
        
    </main>
</div>
@stack('scripts')
</body>
</html>
