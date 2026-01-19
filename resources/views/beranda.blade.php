@extends('layouts.main')

@section('content')
    @include('beranda.hero')

    <!-- Render incomplete version of features (Teaser) -->
    @include('beranda.features', ['limit' => 3])

    <!-- Render incomplete version of motorcycles (Teaser) -->
    @include('beranda.motorcycles', ['limit' => 3])

    @include('beranda.how_it_works')
    @include('beranda.faq')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Hero Animations
            const heroTl = gsap.timeline();
            heroTl.from('#hero-content h1', {
                    y: 100,
                    opacity: 0,
                    duration: 1,
                    ease: 'power4.out',
                    delay: 0.5
                })
                .from('#hero-content p', {
                    y: 30,
                    opacity: 0,
                    duration: 0.8,
                    ease: 'power3.out'
                }, '-=0.6')
                .from('#hero-content .flex', {
                    y: 30,
                    opacity: 0,
                    duration: 0.8,
                    ease: 'power3.out'
                }, '-=0.6')
                .from('#hero-image', {
                    scale: 0.9,
                    opacity: 0,
                    duration: 1.2,
                    ease: 'power4.out'
                }, '-=1');

            // Reveal on scroll components
            const sections = [{
                    id: '#features-header',
                    selector: '#features-header *'
                },
                {
                    id: '#features',
                    selector: '.feature-card'
                },
                {
                    id: '#fleet-header',
                    selector: '#fleet-header *'
                },
                {
                    id: '#motorcycles',
                    selector: '.bike-card'
                },
                {
                    id: '#steps-header',
                    selector: '#steps-header *'
                },
                {
                    id: '#how-it-works',
                    selector: '.step-item'
                }
            ];

            sections.forEach(section => {
                const element = document.querySelector(section.id);
                if (element) {
                    gsap.from(section.selector, {
                        scrollTrigger: {
                            trigger: section.id,
                            start: 'top 90%',
                            toggleActions: 'play none none none'
                        },
                        y: 30,
                        duration: 0.6,
                        stagger: 0.1,
                        ease: 'power2.out'
                    });
                }
            });
        });
    </script>
@endpush
