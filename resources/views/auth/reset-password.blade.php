<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password | Bromotrail</title>
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
                    <h1 class="text-2xl font-bold tracking-tight">Reset Password</h1>
                    <p class="text-zinc-500 text-sm mt-1">Masukkan password baru Anda.</p>
                </div>

                <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

                    <div class="space-y-2">
                        <label for="email" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Alamat Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}"
                            required readonly
                            class="w-full px-4 py-3 bg-zinc-100 border border-zinc-200 text-sm text-zinc-500 cursor-not-allowed"
                            placeholder="name@company.com">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Password Baru
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                            placeholder="Min. 8 karakter">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password_confirmation"
                            class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Konfirmasi Password
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                            placeholder="Ulangi password baru">
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm hover:bg-zinc-800 transition-colors tracking-widest uppercase">
                        Reset Password
                    </button>
                </form>
            </div>

            <p class="text-center mt-8 text-zinc-400 text-[10px] uppercase tracking-widest font-medium">
                &copy; {{ date('Y') }} Bromotrail. Sistem Akses Aman.
            </p>
        </div>
    </div>
</body>

</html>
