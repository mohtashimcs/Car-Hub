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
</head>
<body>
    

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1" style='background-color:#E6FFFD' >
            <div class="row" >
                <div class="col-md-12">
                    <!-- All Cars -->
                    <div class="card" style='background-color:#AEE2FF'>
                        <h5 class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                    <span class="tf-icons fa-solid fa-angles-left"></span> &nbsp; Back
                                </a>
                            </div>
                        </h5>
                        <div class="card-body">
                            <form action="{{ route('send_mail') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-name">Email To:</label>
                                        <input type="email" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}"
                                            id="email" name="email" placeholder="Email to">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-name">cc:</label>
                                        <input type="email" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}"
                                            id="cc" name="cc" placeholder="CC">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-name">bcc:</label>
                                        <input type="email" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}"
                                            id="bcc" name="bcc" placeholder="BCC">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-name">Subject:</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}"
                                            id="name" name="subject" placeholder="Subject">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-name">Body:</label>
                                        <textarea class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}"
                                            id="name" name="details" placeholder="Details"rows="6"></textarea>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                
                                
                            
                                    <div class="col-md-12 col-sm-12 mb-3 text-center">
                                        <button type="submit" class="btn btn-info">
                                            <span class="tf-icons bx bxs-send"></span> &nbsp; Send
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- All Users -->
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->



@section('scripts')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif

</body>
</html>
