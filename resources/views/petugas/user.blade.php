@extends('template.main')

@section('content')

    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="grid"></i></div>
                                Data Akun
                            </h1>
                        </div>
                    </div>
                </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal"><i
                            data-feather="plus-circle" style="margin-right: 8px"></i>Tambah Data</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php $no = 1; ?>

                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark" type="button"
                                            data-bs-toggle="modal" id="edit" data-bs-target="#editModal" data-id='{{ $item->id }}' data-nama='{{ $item->nama }}' data-username='{{ $item->username }}' data-level='{{ $item->level }}'><i
                                                class="fa-solid fa-pen"></i></button>
                                        <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal" id="delete"
                                            data-id='{{ $item->id }}'><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('akun-save') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control form-control-sm mt-2" name="nama" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control form-control-sm mt-2" required name="username">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control form-control-sm mt-2" required name="password">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Level</label>
                            <select name="level" class="form-control form-control-sm mt-2">
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button"
                        data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah yakin ingin menghapus data?</p>
                    <form action="{{ route('akun-delete') }}" method="post">
                        @csrf
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer"><button class="btn btn-secondary" type="button"
                        data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Akun</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('akun-edit') }}" method="post">
                        <input type="hidden" name="id" id="ide">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control form-control-sm mt-2" name="nama" id="nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control form-control-sm mt-2" name="username" id="uname">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control form-control-sm mt-2" name="password">
                            <div style="color:red; font-size:10px">
                                *tidak perlu diisi jika tidak diganti
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Level</label>
                            <select name="level" class="form-control form-control-sm mt-2" required>
                                <option value="null" disabled selected>Pilih Level</option>
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                            <div style="color:red; font-size:10px">
                                *tidak perlu diubah jika tidak diganti
                            </div>
                        </div>

                </div>
                <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button"
                        data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(document).on('click', '#delete', function(e) {
            var id = $(this).attr("data-id");
            $('#id').val(id);
        });
        $(document).on('click', '#edit', function(e) {
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");
            var username = $(this).attr("data-username");
            $('#ide').val(id);
            $('#nama').val(nama);
            $('#uname').val(username);
        });
    </script>

    @if (session('tambah') || session('delete') || session('edit'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('message') }}'
            })
        </script>
    @endif
@endpush
