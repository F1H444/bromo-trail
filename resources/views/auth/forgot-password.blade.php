<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password | Bromotrail</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
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

<body class="bg-[#FAFAFA] font-sans antialiased text-zinc-900">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center gap-3 text-2xl font-bold tracking-tighter">
                    <img src="{{ asset('images/logo.png') }}" alt="Bromotrail Logo" class="w-10 h-10 object-contain">
                    BROMOTRAIL
                </a>
            </div>

            <div class="bg-white border border-zinc-200 p-8 shadow-sm">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold tracking-tight">Lupa Password?</h1>
                    <p class="text-zinc-500 text-sm mt-1">Masukkan email Anda dan kami akan mengirimkan link reset
                        password.</p>
                </div>

                @if (session('status'))
                    <div
                        class="mb-6 p-4 bg-green-50 border border-green-100 text-green-700 text-sm font-bold rounded-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="email" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Alamat Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            autofocus
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                            placeholder="name@company.com">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm hover:bg-zinc-800 transition-colors tracking-widest uppercase">
                        Kirim Link Reset Password
                    </button>
                </form>

                <div class="mt-8 pt-8 border-t border-zinc-100">
                    <p class="text-center text-sm text-zinc-600">
                        Ingat password Anda?
                        <a href="{{ route('login') }}" class="font-bold text-zinc-900 hover:underline">
                            Kembali ke Login
                        </a>
                    </p>
                </div>
            </div>

            <p class="text-center mt-8 text-zinc-400 text-[10px] uppercase tracking-widest font-medium">
                &copy; {{ date('Y') }} Bromotrail. Sistem Akses Aman.
            </p>
        </div>
    </div>
</body>

</html>
