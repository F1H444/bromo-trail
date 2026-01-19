@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-zinc-50 pt-32 pb-16">
        <div class="container mx-auto px-6">
            @include('motor.components.header')

            @if ($motors->isEmpty())
                <div class="text-center py-20">
                    <div class="w-20 h-20 bg-zinc-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fa-solid fa-motorcycle text-zinc-300 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-zinc-900 mb-3">Belum ada motor tersedia</h3>
                    <p class="text-zinc-500">Silakan cek kembali nanti</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($motors as $motor)
                        @include('motor.components.card', ['motor' => $motor])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
