<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h2 class="section-title">Hasil Diagnosis Penyakit</h2>
                </div>
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <div class="card p-3 bg-light">
                            <h5 class="fw-bold text-dark">Kode Penyakit</h5>
                            <p class="text-muted">{{ $penyakit['kode']?? 'Tidak ada kode penyakit' }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card p-3 bg-light">
                            <h5 class="fw-bold text-dark">Nama Penyakit</h5>
                            <p class="text-muted">{{ $penyakit['nama']?? 'Tidak ada nama penyakit' }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card p-3 bg-light">
                            <h5 class="fw-bold text-dark">Persentase</h5>
                            <p class="text-muted">{{ $penyakit['persentase'] ?? '0' }}%</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h5 class="fw-bold text-dark">Solusi Penanganan :</h5>
                    <p class="text-muted">{{ $penyakit['solusi'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
