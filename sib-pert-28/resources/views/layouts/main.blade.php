
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Warung Digital | {{ $title }}</title>

    <!-- Custom fonts for this template-->
<link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

{{-- bootstrap icon --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

 <!-- datatables -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

<link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    
<!-- Custom styles for this template-->
<link href="{{ asset('/css/sb-admin-2.min.css')}} " rel="stylesheet">
<link href="{{ asset('/css/style.css')}} " rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <!-- Main Content -->
    <div id="wrapper">
        @include('component.sidebar')
        <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                @include('component.navbar')
                @yield('content')
                </div>
            </div>
    </div>
    <!-- End of Page Wrapper -->
    <!-- End of Footer -->

   


<!-- Bootstrap core JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="{{ asset('/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('/js/sb-admin-2.min.js')}}"></script>
{{-- Datatable --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script >
    let table = new DataTable('#dataTable');
</script>


</body>

</html>