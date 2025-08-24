<div class="card">

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" wire:ignore.self>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5">{{ $modalFormState === 'edit' ? 'Edit Pengguna' : 'Tambah Gejala' }}</h5>
        <button type="button" class="btn-close" wire:click="cancel"></button>
      </div>

<div class="modal-body">

    <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input wire:model="form.name" type="text" class="form-control" id="name" placeholder="Nama Lengkap">
        @error('form.name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input wire:model="form.email" type="email" class="form-control" id="email" placeholder="Email">
        @error('form.email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input wire:model="form.tanggal_lahir" type="date" class="form-control" id="tanggal_lahir">
        @error('form.tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input wire:model="form.tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
        @error('form.tempat_lahir') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input wire:model="form.pendidikan" type="text" class="form-control" id="pendidikan" placeholder="Pendidikan">
        @error('form.pendidikan') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input wire:model="form.jabatan" type="text" class="form-control" id="jabatan" placeholder="Jabatan">
        @error('form.jabatan') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

</div>
      <div class="modal-footer">

                        <button type="button" wire:click="cancel" class="btn btn-secondary">Batal</button>
                        <button wire:click="save" type="button" class="btn btn-primary">Simpan</button>
      </div>

    </div>
  </div>
</div>

    <!-- Tabel -->
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <input wire:model.live="search" type="text" placeholder="Cari..." class="form-control w-50">
            <button wire:click="showAddForm" class="btn btn-success">Tambah Data</button>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>Nama Pengguna</td>
                    <td>Email</td>
                    <td>Jabatan</td>
                    <td class="text-end">Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->userList as $user)
                    <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->jabatan }}</td>
                        <td class="text-end">
                            <button wire:click="showEditForm({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
        {{ $this->userList->links() }}
        </div>
    </div>

</div>
