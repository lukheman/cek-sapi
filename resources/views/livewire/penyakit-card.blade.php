<div class="card shadow-sm h-100 flex-fill">
    @if ($penyakit->photo)
        <img src="{{ asset('storage/' . $penyakit->photo) }}"
             alt="{{ $penyakit->nama }}"
             class="card-img-top"
             style="height: 200px; object-fit: cover;">
    @else
        <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
             style="height: 200px;">
            <span class="text-muted">Tidak ada gambar</span>
        </div>
    @endif

    <div class="card-body">
        <h5 class="card-title fw-bold">{{ $penyakit->nama }}</h5>
        <p class="card-text">{{ $penyakit->deskripsi }}</p>
    </div>
</div>
