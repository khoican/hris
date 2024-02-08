@extends('layouts.admin')

@section('content')
    <h1 class="fw-bold fs-3">Jabatan</h1>

    <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#positionModal">
        Tambah Jabatan
    </button>

    <div class="w-100 p-3 bg-white rounded-3 mt-3 shadow">
        <table class="table table-primary mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col" style="width: 10%;">#</th>
                    <th scope="col" style="width: 40%;">Jabatan</th>
                    <th scope="col" style="width: 20%;">Gaji / Jam</th>
                    <th scope="col" style="width: 30%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">id</td>
                    <td>name</td>
                    <td class="text-center">Rp. 20.000.000</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#positionModal" data-action="edit" data-id="id" data-name="name"
                            data-salary="20.000.000">
                            Edit
                        </button>
                        {{-- <form action="{{ route('divisions.destroy', $division->id) }}" method="post"
                            style="display:inline;">
                            @csrf
                            @method('DELETE') --}}
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</button>
                        {{-- </form> --}}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Division Modal -->
        <div class="modal fade" id="positionModal" tabindex="-1" role="dialog" aria-labelledby="positionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="positionModalLabel">Add/Edit Division</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="divisionForm" action="" method="post">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">
                            <input type="hidden" name="position_id" id="position_id" value="">
                            <div class="form-group mb-3">
                                <label for="name">Jabatan</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Gaji/Jam</label>
                                <input type="text" class="form-control" id="salary" name="salary_per_hour" required>
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
            $('#positionModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var modal = $(this);

                if (action === 'edit') {
                    // Set modal title for edit
                    modal.find('.modal-title').text('Edit Jabatan');

                    // Set form method and action for edit
                    modal.find('#method').val('PUT');
                    modal.find('#divisionForm').attr('action', '/divisions/' + button.data('id'));

                    // Set division name in the form for edit
                    modal.find('#name').val(button.data('name'));
                    modal.find('#salary').val(button.data('salary'));
                } else {
                    // Set modal title for add
                    modal.find('.modal-title').text('Tambah Jabatan');

                    // Set form method and action for add
                    modal.find('#method').val('POST');
                    modal.find('#divisionForm').attr('action', '/position');

                    // Clear the form for add
                    modal.find('#position_id').val('');
                    modal.find('#name').val('');
                    modal.find('#salary').val('');
                }
            });

            // Handle modal hide event
            $('#positionModal').on('hide.bs.modal', function() {
                // Clear the form on modal hide
                $(this).find('#position_id').val('');
                $(this).find('#name').val('');
                $(this).find('#salary').val('');
            });
        });
    </script>
@endsection
