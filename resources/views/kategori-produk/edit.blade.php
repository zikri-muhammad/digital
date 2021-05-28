@extends('layouts.theme')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Update Kategori</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('kategori-produk.update', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="" class="form-control-label">Nama Barang</label>
                <input type="text" name="nama_kategori" value="{{old('nama_kategori') ?  old('nama_kategori') : $item->nama_kategori}}" class="form-control @error('nama_kategori') is-invalid @enderror" />
                @error('nama_kategori') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="" class="form-control-label">Description Barang</label>
                <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror">{{old('description') ?  old('description') : $item->description }}</textarea>
                @error('description') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection