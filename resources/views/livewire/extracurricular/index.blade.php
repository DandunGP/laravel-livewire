@section('content')
<div>
    <div class="card mx-auto mt-5" style="width:750px">
        <div class="card-body">
            <button type="button" wire:click='openModalAdd' class="btn btn-success" data-toggle="modal">
                Add
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Ekstrakurikuler</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($extra as $ex)
                <tr>
                    <td>{{ $ex->id }}</td>
                    <td>{{ $ex->nama_extra }}</td>
                    <td>{{ $ex->slug }}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editData">Edit</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteData">Delete</button>
                    </td>
                </tr>
                @endforeach


                <!-- Edit -->
                <div wire:ignore.self class="modal fade" id="editData" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Extracurricular</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form>
                                <div class="modal-body">
                                    <input type="hidden" name="idE" wire:model='idE'>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama Extracurricular" wire:model="nama">
                                    </div>
                                    <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Slug" wire:model="slug">
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" wire:click="update()">Save
                                        Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    <!-- Delete -->
    <div wire:ignore.self class="modal fade" id="deleteData" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Extracurricular</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroy({{ $ex->id }})">
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="insertData" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Extracurricular</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Extracurricular" wire:model="nama">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Slug" wire:model="slug">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" wire:click="store">Save</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</tbody>
</table>
</div>
</div>
</div>
@endsection