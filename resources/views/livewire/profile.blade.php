<div class="row">

    <!-- left side -->
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-center align-items-center flex-column">
                        <img src="{{ $form->user->photo ? asset('storage/' . ($form->user->photo ?? '')) : 'assets/images/faces/face1.jpg' }}" alt="" class="user-image rounded-circle" width="120">

                    <div class="mt-2">
                        <label for="profile-photo" class="btn btn-outline-primary btn-sm" style="cursor: pointer;">
                            <i class="bi bi-camera"></i> Ganti Foto
                        </label>
                        <input wire:model="form.photo" type="file" id="profile-photo" class="d-none" accept="image/*">
                        @error('form.photo')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <h3 class="mt-3">{{ $form->user->name }}</h3>
                    <!-- <p class="text-small">Akmal</p> -->
                </div>
            </div>
        </div>
    </div>

    <!-- right side -->
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input wire:model="form.name" type="text" id="name" class="form-control" placeholder="Masukkan nama Anda">
                        @error('form.name')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input wire:model="form.tempat_lahir" type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan nama Anda">
                        @error('form.tempat_lahir')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input wire:model="form.email" type="text" id="email" class="form-control">
                        @error('form.email')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal-lahir" class="form-label">Tanggal Lahir</label>
                        <input wire:model="form.tanggal_lahir" type="date" id="tanggal-lahir" class="form-control">
                        @error('form.tanggal_lahir')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <input wire:model="form.pendidikan" type="text" id="pendidikan" class="form-control">
                        @error('form.pendidikan')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input wire:model="form.jabatan" type="text" id="pendidikan" class="form-control">
                        @error('form.jabatan')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input wire:model="form.password" type="password" id="password" class="form-control" >
                        @error('form.password')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="button" wire:click="edit" class="mt-3 btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
