@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD</h2>
            </div>
            <div class="float-right">
                    <a href="{{ route('projects.create') }}" class="btn btn-primary" role="button">Tambah Produk</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th style="width: 15%">Action</th>
        </tr>
        @foreach ($a as $pro)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pro->nama_produk }}</td>
                <td>{{ $pro->keterangan }}</td>
                <td>{{ $pro->harga }}</td>
                <td>{{ $pro->jumlah }}</td>
                <td>
                    <form action="{{ route('projects.destroy', $pro->id) }}" method="POST">
                        <a href="{{ route('projects.edit', $pro->id) }}" class="btn btn-success" role="button">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $a->links("pagination::bootstrap-4") !!}

@endsection