<div>

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container hero-content">
        <h1 class="fw-bold display-4">CekSapi</h1>
        <p class="lead">Sistem pakar berbasis web ini dirancang untuk membantu mendiagnosis penyakit pada hewan ternak secara cepat dan akurat, berdasarkan gejala yang dialami</p>
        <a href="#penyakit" class="btn btn-light btn-lg mt-3">Mulai Diagnosis</a>
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

<!-- Gejala Penyakit -->
<!-- <section id="gejala" class="py-5 bg-light"> -->
<!--     <div class="container"> -->
<!--         <h2 class="text-center section-title">Gejala Umum Penyakit Sapi</h2> -->
<!--         <div class="row g-4"> -->
<!--             <div class="col-md-3"> -->
<!--                 <div class="card shadow-sm text-center"> -->
<!--                     <div class="card-body"> -->
<!--                         <div class="feature-icon mb-3">🐄</div> -->
<!--                         <h5 class="card-title fw-bold">Demam Tinggi</h5> -->
<!--                     </div> -->
<!--                 </div> -->
<!--             </div> -->
<!--             <div class="col-md-3"> -->
<!--                 <div class="card shadow-sm text-center"> -->
<!--                     <div class="card-body"> -->
<!--                         <div class="feature-icon mb-3">🥶</div> -->
<!--                         <h5 class="card-title fw-bold">Kelesuan</h5> -->
<!--                     </div> -->
<!--                 </div> -->
<!--             </div> -->
<!--             <div class="col-md-3"> -->
<!--                 <div class="card shadow-sm text-center"> -->
<!--                     <div class="card-body"> -->
<!--                         <div class="feature-icon mb-3">🥛</div> -->
<!--                         <h5 class="card-title fw-bold">Penurunan Produksi Susu</h5> -->
<!--                     </div> -->
<!--                 </div> -->
<!--             </div> -->
<!--             <div class="col-md-3"> -->
<!--                 <div class="card shadow-sm text-center"> -->
<!--                     <div class="card-body"> -->
<!--                         <div class="feature-icon mb-3">🍽️</div> -->
<!--                         <h5 class="card-title fw-bold">Kehilangan Nafsu Makan</h5> -->
<!--                     </div> -->
<!--                 </div> -->
<!--             </div> -->
<!--         </div> -->
<!--     </div> -->
<!-- </section> -->

<!-- Call to Action -->
<!-- <section id="diagnosis" class="py-5 text-center"> -->
<!--     <div class="container"> -->
<!--         <h2 class="mb-3">Ingin Diagnosis Cepat?</h2> -->
<!--         <p class="mb-4">Gunakan aplikasi CekSapi untuk mengetahui penyakit sapi Anda berdasarkan gejala yang terdeteksi.</p> -->
<!--         <a href="#" class="btn btn-success btn-lg">Mulai Diagnosis</a> -->
<!--     </div> -->
<!-- </section> -->
</div>
