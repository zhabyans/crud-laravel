@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tambahkan Produk</h2>
            </div>
            <div class="float-right">
                <a  href="{{ route('projects.index') }}" class="btn btn-info" role="button">Home</a>
             </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('projects.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Produk:</strong>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <textarea class="form-control" style="height:50px" name="keterangan"
                        placeholder="Masukkan keterangan produk"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga:</strong>
                    <input type="number" name="harga" class="form-control" placeholder="berapa harganya?">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah:</strong>
                    <input type="number" name="jumlah" class="form-control" placeholder="berapa jumlahnya?">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection