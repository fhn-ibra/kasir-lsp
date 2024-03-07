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
                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal"><i data-feather="plus-circle" style="margin-right: 8px"></i>Tambah Data</a></div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php $no = 1; ?>

                        @foreach ($data as $item)     
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->NamaProduk }}</td>
                            <td>{{ $item->Harga }}</td>
                            <td>{{ $item->Stok }}</td>
                            {{-- @if (Auth::user()->level == 'admin')     
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" type="button"
                                data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i
                                    class="fa-solid fa-pen"></i></button>
                                {{-- <a href="#" class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-solid fa-user"></i></a> --}}
                            {{-- </td> --}}
                            {{-- @endif --}}
                        </tr>
                        @endforeach

                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button></div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
@if(session('tambah'))
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
    title: 'Data Berhasil ditambah'
})
</script>
@endif
@endpush

