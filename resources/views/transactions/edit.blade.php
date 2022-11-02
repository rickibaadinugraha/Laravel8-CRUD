@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transactions.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> </a>
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
    {{-- <form action="{{ route('projects.update', $project->id) }}" method="POST"> --}}
    <form action="{{ route('transactions.update', $projects->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Produk</strong>
                    <input type="text" name="kode_produk" value="{{ $project->kode_produk }}" class="form-control" placeholder="kode_produk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Produk</strong>
                    <textarea class="form-control" style="height:50px" name="nama_produk"
                        placeholder="nama_produk">{{ $project->nama_produk }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Produk</strong>
                    <input type="text" name="harga_produk" class="form-control" placeholder="{{ $project->harga_produk }}"
                        value="{{ $project->harga_produk }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kuantiti</strong>
                    <input type="text" name="harga_produk" class="form-control" placeholder="{{ $project->harga_produk }}"
                        value="{{ $project->harga_produk }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
