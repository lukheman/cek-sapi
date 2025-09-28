<div class="card">

    <!-- Tabel -->
    <div class="card-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>Tanggal Diagnosis</td>
                    <td>Nama Pasien</td>
                    <td>Penyakit</td>
                    <td>Persentase</td>
                    <td class="text-end">Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->riwayatList as $riwayat)
                    <tr>
                        <td>{{ $riwayat->created_at }}</td>
                        <td>{{ $riwayat->nama_pasien }}</td>
                        <td>{{ $riwayat->penyakit->nama }}</td>
                        <td>{{ $riwayat->persentase }}</td>
                        <td class="text-end">
                            <button wire:click="delete({{ $riwayat->id }})" class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $this->riwayatList->links() }}
        </div>
    </div>

</div>
