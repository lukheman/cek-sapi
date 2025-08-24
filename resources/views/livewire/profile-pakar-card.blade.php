<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card p-5">
                <div class="text-center mb-5">
                    <i class="fas fa-user-md feature-icon mb-3"></i> <!-- Ikon pakar -->
                    <h2 class="section-title">Profil Pakar</h2>
                </div>
                <div class="row align-items-center">
                    <!-- <div class="col-md-4 text-center mb-4 mb-md-0"> -->
                    <!--     <img src="https://via.placeholder.com/200" alt="Foto Profil" class="rounded-circle shadow-sm" style="width: 200px; height: 200px; object-fit: cover;"> -->
                    <!-- </div> -->
                    <div class="col-md-12">
                        <div class="mb-4">
                            <h5 class="fw-bold text-dark">Nama</h5>
                            <p class="text-muted">{{ $pakar->name }}</p>
                        </div>
                        <div class="mb-4">
                            <h5 class="fw-bold text-dark">Tempat/Tanggal Lahir</h5>
                            <p class="text-muted">{{ $pakar->tempat_lahir}} / {{ $pakar->tanggal_lahir}}</p>
                        </div>
                        <div class="mb-4">
                            <h5 class="fw-bold text-dark">Pendidikan</h5>
                            <p class="text-muted">{{ $pakar->pendidikan}}</p>
                        </div>
                        <div class="mb-4">
                            <h5 class="fw-bold text-dark">Jabatan</h5>
                            <p class="text-muted">{{ $pakar->jabatan}}</p>
                        </div>
                        <!-- <div> -->
                        <!--     <a href="#contact" class="btn btn-success"> -->
                        <!--         <i class="fas fa-envelope me-2"></i>Hubungi Pakar -->
                        <!--     </a> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
