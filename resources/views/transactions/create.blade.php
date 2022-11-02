@extends('layouts.app')
@section('title', 'Create Product')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Form Entri Master Produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No Transaksi</strong>
                        <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal Transaksi</strong>
                        <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk">
                    </div>
                </div>
                <div class="mx-auto pull-right">
                    <div class="">
                        <form action="{{ route('projects.index') }}" method="GET" role="search">
                            <div class="input-x">
                                <span class="input-group-btnx mr-0 mt-1">
                                    <button class="btn btn-info" type="submit" title="Search projects">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-controlx mr-2" name="term" placeholder="Search projects" id="term" style="display:">
                                <a href="{{ route('projects.index') }}" class=" mt-1">
                                    <span class="input-group-btnx">
                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Produk</strong>
                    <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Produk</strong>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Produk</strong>
                    <input type="text" name="harga_produk" class="form-control" placeholder="harga_produk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kuantiti</strong>
                    <input type="text" name="stock_aktual" class="form-control" placeholder="stock_aktual">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection

