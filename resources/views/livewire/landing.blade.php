<div>

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container hero-content">
        <h1 class="fw-bold display-4">CekSapi</h1>
        <p class="lead">Sistem pakar berbasis web ini dirancang untuk membantu mendiagnosis penyakit pada hewan ternak secara cepat dan akurat, berdasarkan gejala yang dialami</p>
        <a href="{{ route('diagnosis')}}" class="btn btn-light btn-lg mt-3">Mulai Diagnosis</a>
    </div>
</section>

<!-- Informasi Penyakit -->
<section id="penyakit" class="py-5">
    <div class="container">
        <h2 class="text-center section-title">Informasi Penyakit</h2>
        <div class="row g-4">
            @if ($penyakitList->isEmpty())
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data penyakit.</p>
                </div>
            @else
                @foreach ($penyakitList as $penyakit)
                <div class="col-md-4 d-flex">
                    <livewire:penyakit-card :penyakit="$penyakit" wire:key="$penyakit->id" />
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

</div>
