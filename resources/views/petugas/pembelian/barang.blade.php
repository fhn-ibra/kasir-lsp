@extends('template.main')

@section('content')
{{-- @dd($pelanggan->NamaPelanggan) --}}
<main>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <!-- Invoice-->
        <div class="card invoice">
            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-start">
                        <div class="h2 text-white mb-0">Detail Pembelian</div>
                        Barang & Kuantitas
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-end">
                        #{{ $penjualan->PenjualanID }}
                        <br />
                        {{ $penjualan->TanggalPenjualan }}
                    </div>
                </div>
            </div>
            
            <div class="card-footer border-top-0">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="small text-muted text-uppercase fw-700 mb-2">Nama Pelanggan</div>
                        <div class="h6 mb-1">{{ $pelanggan->NamaPelanggan }}</div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="small text-muted text-uppercase fw-700 mb-2">No. Telp</div>
                        <div class="h6 mb-0">{{ $pelanggan->NomorTelepon }}</div>

                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="small text-muted text-uppercase fw-700 mb-2">Alamat</div>
                        <div class="small mb-0">{{ $pelanggan->Alamat }}</div>
                    </div>
                </div>
            </div>

            <div class="card-body p-4 p-md-5">
                
                <!-- Invoice table-->
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Nama Produk</th>
                                <th class="text-end" scope="col">Kuantitas</th>
                                <th class="text-end" scope="col">Harga Satuan</th>
                                <th class="text-end" scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Invoice item 1-->
                            @foreach ($detailPenjualan as $item)       
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">{{ $item->produk->NamaProduk }}</div>
                                </td>
                                <td class="text-end fw-bold">{{ $item->JumlahProduk }}</td>
                                <td class="text-end fw-bold">Rp. {{ number_format($item->Subtotal/$item->JumlahProduk, 0, ',', '.') }}</td>
                                <td class="text-end fw-bold">Rp. {{ number_format($item->Subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#pilihModal">Tambah Barang</button></td>
                                <td class="text-end pb-0" colspan="2"><div class="text-uppercase small fw-700 text-muted">Total Harga:</div></td>
                                <td class="text-end pb-0"><div class="h5 mb-0 fw-700 text-green">Rp. {{ number_format($penjualan->TotalHarga, 0, ',', '.') }}</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</main>

<div class="modal fade" id="pilihModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Produk</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="border-bottom">
                                <tr class="small text-uppercase text-muted">
                                    <th scope="col">Nama Produk</th>
                                    <th class="text-end" scope="col">Harga</th>
                                    <th class="text-end" scope="col">Stok</th>
                                    <th class="text-end" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($barang as $item)    
                              <tr class="border-bottom">
                                  <td>
                                      <div class="fw-bold">{{ $item->NamaProduk }}</div>
                                  </td>
                                  <td class="text-end fw-bold">{{ number_format($item->sum('Harga'), 0, ',', '.') }}</td>
                                  <td class="text-end fw-bold">{{ $item->Stok }}</td>
                                  <td class="text-end fw-bold">
                                    <button class="btn btn-primary btn-sm" {{ $item->Stok <= 0 ? 'disabled' : '' }} id="pilih" data-bs-toggle="modal" data-bs-target="#tambahModal" data-id="{{ $item->ProdukID }}" data-nama="{{ $item->NamaProduk }}" data-harga="{{ $item->Harga }}" data-stok="{{ $item->Stok }}">Pilih</button>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('beli-save') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="PenjualanID" value="{{ $penjualan->PenjualanID }}">
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Nama Barang</label>
                            <input type="text" name="barang" class="form-control mt-2" disabled id="nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Stok Tersisa</label>
                            <input type="number" name="stok" class="form-control mt-2" disabled id="stok">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Harga Satuan</label>
                            <input type="number" class="form-control mt-2" disabled id="harga">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Jumlah yang Dibeli</label>
                            <input type="number" class="form-control mt-2" name="jumlah">
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
         $(document).on('click', '#pilih', function(e) {
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");
            var harga = $(this).attr("data-harga");
            var stok = $(this).attr("data-stok");
            $('#id').val(id);
            $('#nama').val(nama);
            $('#harga').val(harga);
            $('#stok').val(stok);
        });
    </script>

@if (session('error'))
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
        icon: 'error',
        title: '{{ session('message') }}'
    })
</script>
@endif

@if (session('tambah'))
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