@extends('layouts.theme')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Produk</strong>
    </div>
    @if (session('error'))
    <div class="form-group col-md-12">

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    </div>
    @endif
    <div class="card-body card-block">
        <form action="{{ route('transaksions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-12">
                <label for="" class="form-control-label">Nama</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" />
                @error('name') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="" class="form-control-label">Type Transaksion</label>
                <div class="input-field s12">
                <select class="custom-select custom-select" name="type_transaksi">
                        <option value="" disabled selected>Choose your option</option>
                    @foreach ($typeTransaksions as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div id="cloneForm" class="row form-group"></div>
            <div class="col-md-2">
                <span class="btn btn-primary btn-block add">Add Produk</span>
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary btn-block" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('custom-scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        function remove(id){
            $(`#${id}`).remove();
        }

        function addForm(id){
            $('#cloneForm').append(
                `<div id="${id}" class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Poduk</label>
                        <div class="input-field s12">
                        <select class="custom-select custom-select-sm" name="produk_id[]">
                                <option value="" disabled selected>Choose your option</option>
                            @foreach ($produk as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Stok</label>
                        <input type="text" name="stok[]" value="{{old('stok')}}" class="form-control @error('stok') is-invalid @enderror" />
                        @error('stok') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="col-md-3 float-right">
                        <button type="button" class="btn btn-danger btn-block" onClick="remove('${id}')">Remove</button>
                    </div>
                </div>
                `);
        }

        $(document).ready(function() {
            let counter = 1;
            $(".add").click(function() {
                addForm(`form${counter}`);
                counter++;
            });
        });
        
    </script>
@endpush