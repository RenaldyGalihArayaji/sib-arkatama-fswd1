@extends('layouts.main')

@section('content')

<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-title">Data Staff</h1>
    </div>


     {{-- table --}}
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/staff-create" class="btn btn-primary "><i class="bi bi-plus-circle "></i>Add New</a>
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->role->name}}</td>
                                <td>
                                    <form action="/data-staff/{{ $item->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="confirm('yakin mau di hapaus?')"><i class="bi bi-trash"></i></button>
                                    </form>
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