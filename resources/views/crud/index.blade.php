<html>
    <head>
<title></title>
<meta name="csrf-token" content="{{ csrf_token() }}">
     <meta charset="utf-8" />
     <meta name="viewport"
         content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

     <title> Drive Away | @yield('title') </title>

     <meta name="description" content="" />

     <!-- Favicon -->
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link
         href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
         rel="stylesheet" />

     <!-- Icons. Uncomment required icon fonts -->
     <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

     <!-- Core CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
         class="template-customizer-theme-css" />
     <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

     <!-- Vendors CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
     <!--fontawesome-->
     <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.min.css') }}">
     <!--sweetalert2-->
     <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/sweetalert2.min.css') }}" />
     <!--jquery-->
     <script src="{{ asset('assets/js/ajax_jquery.js') }}"></script>
     <!--Toastr-->
     <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
     <!-- Page CSS -->
     @yield('styles')
     <!-- Helpers -->
     <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
     <script src="{{ asset('assets/js/config.js') }}"></script>

     <!-- Include DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1">
            <div class="row">
                <div class="col-md-12">
                    <!-- All Cars -->
                    <div class="card">
                        <h5 class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                All Cars
    
                            </div>
                        </h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped" id="users_cars">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Car Registered</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                        @foreach ($many as $car)
                                            <tr>
                                                <td>{{$car->User->name}}</td>
                                                <td>{{ $car->Car->name }}</td>
                                                
                                                
                                                <td>&nbsp;&nbsp;
                                                    <a href="{{ route('many-edit', ['id' => $car->car_id]) }}"
                                                        id="{{ $car->user_id }}"
                                                        class="btn btnEditCar btn-sm btn-s rounded-pill btn-icon btn-outline-info">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-warning">Edit</button>
                                                    </a>
                                                    <br><br>
                                                    
                                                    <form method="post" action="{{ route('many-destroy', ['id' => $car->car_id]) }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                    <!-- All Users -->
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->
</body>
<script>
$(document).ready(function() {
        $('#users_cars').DataTable();
    });
    </script>
</html>