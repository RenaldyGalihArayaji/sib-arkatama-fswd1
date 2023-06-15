@extends('layouts.main')

@section('content')
    
    <div class="container">
         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Product</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><iclass="fas fa-download fa-sm text-white-50"></iclass=> Generate Report</a>
        </div>

        {{-- table --}}
          <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/daftar-create" class="btn btn-primary "><i class="bi bi-plus-circle "></i>Add New</a>
            </div>
            <div class="card-body">
                @if (session()->has('succes'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('succes')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>qty</th>
                                <th>price</th>
                                <th>description</th>
                                <th>gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category_id }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->description }}</td>
                                <td><img src="{{ asset('/storage/public/gambar_product/' .$item->image)}}" alt="" width="70"></td>
                                <td>
                                    <a href="/daftar-edit/{{ $item->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/daftar-delete/{{ $item->id }}" class="btn btn-danger" onclick="confirm('yakin mau di hapaus?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>  
                            @empty
                                <tr>
                                    <td colspan="8 " class="text-center">Data Kosong!!</td>
                                </tr>
                            </tbody>
                            @endforelse
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection