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
                @if (Auth::user()->role_id == 1)
                <a href="/product-create" class="btn btn-primary "><i class="bi bi-plus-circle "></i>Add New</a>
                @endif
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
                                @if (Auth::user()->role_id = 1 && Auth::user()->role_id = 2 )
                                <th>Category</th>
                                <th>qty</th>
                                @endif
                                <th>price</th>
                                <th>description</th>
                                <th>gambar</th>
                                @if (Auth::user()->role_id == 1 && Auth::user()->role_id == 2 )
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                @if (Auth::user()->role_id == 1 && Auth::user()->role_id == 2 )
                                <td>{{ $item->category_id }}</td>
                                <td>{{ $item->qty }}</td>
                                @endif
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->description }}</td>
                                <td><img src="{{ asset('/storage/public/gambar_product/' .$item->image)}}" alt="" width="70"></td>
                                
                                <td>
                                @if (Auth::user()->role_id != 1  )
                                <a href="/product-delete/{{ $item->id }}" class="btn btn-danger" onclick="confirm('yakin mau di hapaus?')"><i class="bi bi-trash"></i></a>
                                @endif
                                <a href="/product-edit/{{ $item->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
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