@extends('layouts.theme')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Produks</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nama Kategori
                                    </th>
                                    <th>
                                        Nama Produk
                                    </th>
                                    <th>
                                        Deskripsi
                                    </th>
                                    <th>
                                        Gambar Produk
                                    </th>
                                    <th>
                                        Stok
                                    </th>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ $item->kategoriProduk->nama_kategori }}
                                    </td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <div class="card-avatar">
                                            {{-- <a href="javascript:;"> --}}
                                              {{-- <img class="img" src="../assets/img/faces/marc.jpg" /> --}}
                                              <img src="{{ url("storage/$item->gambar") }}" alt="" style="height: 38px;">
                                            {{-- </a> --}}
                                          </div>
                                    </td>
                                    <td>{{ $item->stok }}</td>
                                    <td>
                                        <a href="{{ route('produks.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('produks.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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