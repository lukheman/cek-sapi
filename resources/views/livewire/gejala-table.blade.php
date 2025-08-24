<div class="card">

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" wire:ignore.self>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5">{{ $modalFormState === 'edit' ? 'Edit Gejala' : 'Tambah Gejala' }}</h5>
        <button type="button" class="btn-close" wire:click="cancel"></button>
      </div>

<div class="modal-body">

    <div class="form-group">
        <label for="kode">Kode Gejala</label>
        <input wire:model="form.kode" type="text" class="form-control" id="kode" placeholder="Kode Gejala">
        @error('form.kode') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label for="nama">Nama Gejala</label>
        <input wire:model="form.nama" type="text" class="form-control" id="nama" placeholder="Nama Gejala">
        @error('form.nama') <small class="text-danger">{{ $message }}</small> @enderror
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
                    <td>Kode Gejala</td>
                    <td>Nama Gejala</td>
                    <td class="text-end">Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->gejalaList as $gejala)
                    <tr>
                    <td>{{ $gejala->kode }}</td>
                    <td>{{ $gejala->nama }}</td>
                        <td class="text-end">
                            <button wire:click="showEditForm({{ $gejala->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="delete({{ $gejala->id }})" class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
        {{ $this->gejalaList->links() }}
        </div>
    </div>

</div>
