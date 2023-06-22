@extends('layouts.main')

@section('content')
    
   
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-title">Dashboard</h1>            
            </div>

            <!-- Content Row -->
            <div class="row">

                
                @if (Auth::user()->role_id == 1)

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Product</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $product }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-tablet-landscape-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Category Product</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-clipboard2-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Customer</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-danger shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                       Staff</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userStaff }}</div>
                               </div>
                               <div class="col-auto">
                                   <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
                
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Product Waiting</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productWaiting }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @elseif(Auth::user()->role_id == 3)

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Product</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $product }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-tablet-landscape-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Category Product</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-clipboard2-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Pending Requests Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Customer</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>

        </div>
        <!-- /.container-fluid -->
@endsection