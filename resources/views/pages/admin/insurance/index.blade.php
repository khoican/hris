@extends('layouts.admin')

@section('content')
<h1 class="fw-bold fs-3">Asuransi</h1>

<button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#insuranceModal">
    Tambah Asuransi
</button>

<div class="w-100 p-3 bg-white rounded-3 mt-3 shadow">
    <table class="table table-primary mt-3">
        <thead>
            <tr class="text-center">
                <th scope="col" style="width: 10%;">#</th>
                <th scope="col" style="width: 40%;">Jenis Asuransi</th>
                <th scope="col" style="width: 35%;">Biaya</th>
                <th scope="col" style="width: 25%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($insurances as $insurance)
            <tr>
                <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                <td>{{ $insurance->name }}</td>
                <td>Rp. {{ number_format($insurance->cost) }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target="#insuranceModal" data-action="edit" data-id="{{ $insurance->id }}"
                        data-name="{{ $insurance->name }}" data-cost="{{ $insurance->cost }}">
                        Edit
                    </button>
                    <form action="{{ route('asuransi.destroy', $insurance->id) }}" method="post"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Division Modal -->
    <div class="modal fade" id="insuranceModal" tabindex="-1" role="dialog" aria-labelledby="insuranceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="divisionModalLabel">Add/Edit Division</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insuranceForm" action="{{ route('asuransi.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" id="method" value="POST">
                        <div class="form-group mb-3">
                            <label for="name">Nama Asuransi</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Biaya Asuransi</label>
                            <input type="number" class="form-control" id="cost" name="cost" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
            // Handle modal show event
            $('#insuranceModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let action = button.data('action');
                let modal = $(this);

                if (action === 'edit') {
                    // Set modal title for edit
                    modal.find('.modal-title').text('Edit Asuransi');

                    // Set form method and action for edit
                    modal.find('#method').val('PUT');
                    let updateUrl = '/asuransi/update/' + button.data('id');
                    modal.find('#insuranceForm').attr('action', updateUrl);

                    // Set division name in the form for edit
                    modal.find('#name').val(button.data('name'));
                    modal.find('#cost').val(button.data('cost'));
                } else {
                    // Set modal title for add
                    modal.find('.modal-title').text('Tambah Asuransi');

                    // Set form method and action for add
                    modal.find('#method').val('POST');
                    modal.find('#insuranceForm').attr('action', '/asuransi/store');

                    // Clear the form for add
                    modal.find('#name').val('');
                    modal.find('#cost').val('');
                }
            });

            // Handle modal hide event
            $('#insuranceModal').on('hide.bs.modal', function() {
                // Clear the form on modal hide
                $(this).find('#name').val('');
                $(this).find('#cost').val('');
            });
        });
</script>
@endsection