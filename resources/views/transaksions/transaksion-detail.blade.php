@extends('layouts.theme')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Transaksion Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Name = {{ $transaksion->name }}
                                    </th>
                                    <th>
                                        Type Transaksion = {{ $transaksion->typeTransaksions->name }}
                                    </th>
                                    <th>
                                        Tanggal = {{ date_format($transaksion->created_at,"Y/m/d H:i:s") }}
                                    </th>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nama Produk
                                    </th>
                                    <th>
                                        Stok
                                    </th>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->produks->nama_produk }}</td>
                                    <td>{{ $item->stok }}</td>
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