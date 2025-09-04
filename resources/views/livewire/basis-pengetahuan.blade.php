<div class="card">

    <div class="modal fade" id="modal-gejala-penyakit" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fs-5">Gejala Penyakit</h5>
                    <button type="button" class="btn-close" wire:click="cancel"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-8">

                            <div class="card">
                                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th scope="col">Kode Gejala</th>
                                <th scope="col">Nama Gejala</th>
                                <th scope="col" class="text-end">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @if (isset($this->selectedPenyakit) && $this->selectedPenyakit->gejala->isNotEmpty())

                            @foreach ($selectedPenyakit->gejala as $gejala)
                            <tr>
                                <td>{{ $gejala->kode}}</td>
                                    <td>{{ $gejala->nama}}</td>
                                    <td class="text-end">
                                    <button class="btn btn-danger btn-sm" wire:click="deleteGejalaPenyakit({{ $gejala->id }})">Hapus Gejala</button>
                                        </td>
                                        </tr>

                                        @endforeach
                                        @endif

                                        </tbody>

                                        </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="gejala">Gejala</label>
                                        <select class="form-control" id="gejala" wire:model="selectedIdGejala">
                                        <option value="">Pilih Gejala</option>
                                            @foreach ($this->gejala as $item)
                                            <option value="{{ $item->id }}">{{ $item->kode}} - {{ $item->nama }}</option>

                                            @endforeach

                                        </select>

                                    </div>

                                    <button wire:click="saveGejalaPenyakit" class="btn btn-success float-end">Simpan</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <input wire:model.live="search" type="text" placeholder="Cari..." class="form-control w-50">
        </div>
    </div>

    <div class="card-body">

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Kode Penyakit</th>
                    <th scope="col">Nama Penyakit</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($this->penyakit as $item)
                <tr>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                        <td class="text-end">
                            <button wire:click="showGejalaPenyakit({{ $item->id }})" class="btn btn-success btn-sm">Lihat Gejala Penyakit</button>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">

        {{ $this->penyakit->links()}}
        </div>


    </div>

</div>
