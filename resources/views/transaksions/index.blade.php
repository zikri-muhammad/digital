@extends('layouts.theme')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Transaksion</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nama User
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Type Produk
                                    </th>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->users->nama_depan }} {{ $item->users->nama_belakang }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->typeTransaksions->name }}</td>
                                    <td>
                                        <a href="{{ route('transaksions.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('transaksions.transaksionDetail', $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-detail"></i>
                                        </a>
                                        {{-- <form action="{{ route('produks.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <p>Data Kosong</p>
                                    </td>
                                </tr>
                                    
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection