@extends('layouts.theme')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                      <div class="row">

                        <div class="col-md-8">
                            <h4 class="card-title pull-lift">Transaksions</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-grey lighten-5 pull-right"> Tambah </a>
                        </div>
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
                                        Nama Kategori
                                    </th>
                                    <th>
                                        Deskripsi
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Dakota Rice
                                        </td>
                                        <td>
                                            Niger
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection