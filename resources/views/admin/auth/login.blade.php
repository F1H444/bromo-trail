<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Bromotrail</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-zinc-900 font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <!-- Logo & Title -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-3 mb-6">
                    <img src="{{ asset('images/logo.png') }}" alt="Bromotrail Logo" class="w-12 h-12 object-contain">
                    <h1 class="text-3xl font-black tracking-tighter text-white uppercase">BROMOTRAIL</h1>
                </div>
                <p class="text-zinc-400 text-sm uppercase tracking-widest font-bold">Admin Panel</p>
            </div>

            <!-- Login Card -->
            <div class="bg-zinc-800 border border-zinc-700 p-10 shadow-2xl">
                <h2 class="text-2xl font-bold text-white mb-2">Login Admin</h2>
                <p class="text-zinc-400 text-sm mb-8">Masuk ke sistem manajemen Bromotrail</p>

                @if ($errors->any())
                    <div
                        class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-400 text-sm font-bold rounded-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ url('/admin/login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="username" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Username
                        </label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required
                            autofocus
                            class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white text-sm focus:outline-none focus:border-zinc-500 transition-colors"
                            placeholder="username">
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Password
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white text-sm focus:outline-none focus:border-zinc-500 transition-colors"
                            placeholder="••••••••">
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-white text-zinc-900 text-xs font-black rounded-sm hover:bg-zinc-100 transition-colors tracking-widest uppercase shadow-xl">
                        <i class="fa-solid fa-right-to-bracket mr-2"></i>
                        Masuk ke Admin Panel
                    </button>
                </form>
            </div>

            <p class="text-center mt-8 text-zinc-500 text-[10px] uppercase tracking-widest font-medium">
                &copy; {{ date('Y') }} Bromotrail. Admin Access Only.
            </p>
        </div>
    </div>
</body>

</html>
