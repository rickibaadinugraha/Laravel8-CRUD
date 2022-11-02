@extends('layouts.app')
@section('title', 'Daftar Produk')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Master Produk </h2>
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>
    <div>
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
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stock</th>
            {{-- <th>Date Created</th> --}}
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $key => $project)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $project->kode_produk }}</td>
                <td>{{ $project->nama_produk }}</td>
                <td>{{ $project->harga_produk }}</td>
                <td>{{ $project->stocks->stock_aktual }}</td>
                {{-- <td>{{ date_format($project->created_at, 'jS M Y') }}</td> --}}
                <td>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                        <a href="{{ route('projects.show', $project->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('projects.edit', $project->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {!! $projects->links() !!} --}}

@endsection
