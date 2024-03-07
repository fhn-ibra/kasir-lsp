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
                                Data Produk
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
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php $no = 1; ?>

                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->NamaProduk }}</td>
                                    <td>Rp. {{ number_format($item->Harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->Stok }}</td>
                                    <td>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark" type="button"
                                            data-bs-toggle="modal" id="edit" data-bs-target="#editModal" data-id='{{ $item->ProdukID }}' data-nama='{{ $item->NamaProduk }}' data-harga='{{ $item->Harga }}' data-stok='{{ $item->Stok }}'><i
                                                class="fa-solid fa-pen"></i></button>
                                        <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal" id="delete"
                                            data-id='{{ $item->ProdukID }}'><i class="fa-solid fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produk-save') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Nama Produk</label>
                            <input type="text" class="form-control form-control-sm mt-2" name="produk">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" class="form-control form-control-sm mt-2" name="harga">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Stok</label>
                            <input type="number" class="form-control form-control-sm mt-2" name="stok">
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
                    <form action="{{ route('produk-delete') }}" method="post">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produk-edit') }}" method="post">
                        <input type="hidden" name="id" id="ide">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Nama Produk</label>
                            <input type="text" class="form-control form-control-sm mt-2" name="produk" id="nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" class="form-control form-control-sm mt-2" name="harga" id="harga">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Stok</label>
                            <input type="number" class="form-control form-control-sm mt-2" name="stok" id="stok">
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
            var harga = $(this).attr("data-harga");
            var stok = $(this).attr("data-stok");
            $('#ide').val(id);
            $('#nama').val(nama);
            $('#harga').val(harga);
            $('#stok').val(stok);
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
