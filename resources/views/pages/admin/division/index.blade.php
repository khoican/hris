@extends('layouts.admin')

@section('content')
    <h1 class="fw-bold fs-3">Divisi</h1>

    <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#divisionModal">
        Tambah Divisi
    </button>

    <div class="w-100 p-3 bg-white rounded-3 mt-3 shadow">
        <table class="table table-primary mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col" style="width: 10%;">#</th>
                    <th scope="col" style="width: 60%;">Divisi</th>
                    <th scope="col" style="width: 30%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divisions as $division)
                    <tr>
                        <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                        <td>{{ $division->name }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#divisionModal" data-action="edit" data-id="{{ $division->id }}"
                                data-name="{{ $division->name }}">
                                Edit
                            </button>
                            <form action="{{ route('divisi.destroy', $division->id) }}" method="post"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr @endforeach
            </tbody>
        </table>

        <!-- Division Modal -->
        <div class="modal fade" id="divisionModal" tabindex="-1" role="dialog" aria-labelledby="divisionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="divisionModalLabel">Add/Edit Division</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="divisionForm" action="{{ route('divisi.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">
                            <input type="hidden" name="division_id" id="division_id" value="">
                            <div class="form-group">
                                <label for="name">Divisi</label>
                                <input type="text" class="form-control" id="name" name="name" required>
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
            $('#divisionModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let action = button.data('action');
                let modal = $(this);

                if (action === 'edit') {
                    // Set modal title for edit
                    modal.find('.modal-title').text('Edit Divisi');

                    // Set form method and action for edit
                    modal.find('#method').val('PUT');
                    let updateUrl = '/divisi/update/' + button.data('id');
                    modal.find('#divisionForm').attr('action', updateUrl);

                    // Set division name in the form for edit
                    modal.find('#name').val(button.data('name'));
                } else {
                    // Set modal title for add
                    modal.find('.modal-title').text('Tambah Divisi');

                    // Set form method and action for add
                    modal.find('#method').val('POST');
                    modal.find('#divisionForm').attr('action', '/divisi/store');

                    // Clear the form for add
                    modal.find('#division_id').val('');
                    modal.find('#name').val('');
                }
            });

            // Handle modal hide event
            $('#divisionModal').on('hide.bs.modal', function() {
                // Clear the form on modal hide
                $(this).find('#division_id').val('');
                $(this).find('#name').val('');
            });
        });
    </script>
@endsection
