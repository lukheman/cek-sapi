<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
      <div class="card p-5">
        <div class="text-center mb-5">
          <img src="{{ $pakar->photo ? asset('storage/' . ($pakar->photo ?? '')) : asset('assets/images/faces/face1.jpg') }}"
               alt="Foto Profil"
               class="rounded-circle shadow-sm mb-3"
               style="width: 200px; height: 200px; object-fit: cover;">
          <h2 class="section-title">Profil Pakar</h2>
        </div>

        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="mb-4">
              <h5 class="fw-bold text-dark">Nama</h5>
              <p class="text-muted">{{ $pakar->name }}</p>
            </div>
            <div class="mb-4">
              <h5 class="fw-bold text-dark">Tempat/Tanggal Lahir</h5>
              <p class="text-muted">{{ $pakar->tempat_lahir }} / {{ $pakar->tanggal_lahir }}</p>
            </div>
            <div class="mb-4">
              <h5 class="fw-bold text-dark">Pendidikan</h5>
              <p class="text-muted">{{ $pakar->pendidikan }}</p>
            </div>
            <div class="mb-4">
              <h5 class="fw-bold text-dark">Jabatan</h5>
              <p class="text-muted">{{ $pakar->jabatan }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
