<section id="motorcycles" class="py-24 bg-zinc-50">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div class="max-w-2xl" id="fleet-header">
                <h2 class="text-sm font-bold text-zinc-400 uppercase tracking-widest mb-4">Pilihan Motor Trail</h2>
                <h3 class="text-4xl font-bold tracking-tighter text-zinc-900 leading-tight">
                    Siap Libas Pasir Bromo. <br>
                    Kuat Nanjak Sampai Puncak.
                </h3>
            </div>
            <a href="{{ url('/motor') }}" class="text-sm font-bold text-zinc-900 flex items-center gap-2 group">
                SEMUA UNIT
                <svg class="group-hover:translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($motors as $motor)
                @include('motor.components.card', ['motor' => $motor])
            @endforeach
        </div>
    </div>
</section>
