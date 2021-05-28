@extends('layouts.theme')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Produk</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="form-control-label">Kategori Produk</label>
                <div class="input-field col s12">
                <select class="custom-select custom-select-sm" name="kategori_produk_id">
                    @foreach ($kategoriProduk as $kategori)
                        <option value="" disabled selected>Choose your option</option>
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="form-control-label">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{old('nama_produk') ?  old('nama_produk') : $item->nama_produk}}" class="form-control @error('nama_produk') is-invalid @enderror" />
                @error('nama_produk') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="" class="form-control-label">Description</label>
                <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror">{{old('description') ?  old('description') : $item->description}}</textarea>
                @error('description') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="" class="form-control-label">Stok</label>
                <input type="text" name="stok" value="{{old('stok') ?  old('stok') : $item->stok}}" class="form-control @error('stok') is-invalid @enderror" />
                @error('stok') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="fileGambar" class="form-control-label">Gambar Produk</label>
                <input type="file" name="gambar" id="fileGambar" value="{{old('gambar') ?  old('gambar') : $item->gambar}}" accept="image/*"
                    class="form-control @error('gambar') is-invalid @enderror" />
                @error('gambar') <div class="text-muted">{{$message}}</div> @enderror
            </div>
                <button class="btn btn-primary btn-block" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection