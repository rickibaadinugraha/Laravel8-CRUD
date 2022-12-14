@extends('layouts.app')
@section('title', 'Edit Kontrol Produk')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i
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

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
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
                    {{ $project->nama_produk }}
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
                    <strong>Gambar</strong>
                    <input type="file" name="file_img_produk" class="form-control" placeholder="{{ $project->file_img_produk }}"
                        value="{{ $project->file_img_produk }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock</strong>
                    <input type="text" class="form-control @error('stock_aktual') is-invalid @enderror" id="exampleInputName" placeholder="Stock Aktual" name="stock_aktual" value="{{$project->stocks->stock_aktual ?? old('stock_aktual')}}">
                    @error('stock_aktual') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
