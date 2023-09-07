@extends('master')

@section('content')
<h2> Daftar Pesanan</h2>
<hr />
<!-- Button trigger modal -->
<div>
    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#exampleModal">
        Tambah pesanan
    </button>
    <br />
    <br />
    @if (!$data->isEmpty())
    <table class="table table-striped">
        <tr>
            <th>No Pesanan</th>
            <th>Nama Supplier</th>
            <th>Nama Produk</th>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>

        @foreach ($data as $item)
        <tr>
            <td>{{$item->no_pesanan}}</td>
            <td>{{$item->nm_supplier}}</td>
            <td>{{$item->nm_product}}</td>
            <td>{{$item->tanggal}}</td>
            <td>{{$item->total}}</td>

        </tr>
        @endforeach


    </table>
    @endif

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('pesanan.store')}}">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Pesanan</label>
                        <input type="text" name="no_pesanan" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Supplier</label>
                        <input type="text" name="nm_supplier" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                        <input type="text" name="nm_product" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Total</label>
                        <input type="number" name="total" class="form-control" id="exampleFormControlInput1">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
