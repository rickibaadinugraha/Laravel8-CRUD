@extends('layouts.app')
@section('title', 'Daftar Produk')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Form Transaksi Penjualan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('transactions.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cari Produk</strong>
                    <form action="/transactions/create" method="get">
                        <input type="search" class="form-control" name="search" placeholder="search">
                    </form>
                </div>
            </div>            {{-- <th>Date Created</th> --}}
            {{-- <th width="280px">Action</th> --}}
        </tr>
        @foreach ($projects as $project)
            <tr>
                {{-- <td>{{ $project->kode_produk }}</td>
                <td>{{ $project->nama_produk }}</td>
                <td>{{ $project->harga_produk }}</td> --}}
                {{-- <td>
                    <form action="{{ route('transactions.destroy', $project->id) }}" method="POST">

                        <a href="{{ route('transactions.show', $project->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('transactions.edit', $project->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td> --}}
            </tr>
        @endforeach
    </table>

    {{-- {!! $projects->links() !!} --}}

@endsection
