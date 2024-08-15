<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="320 Team" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
<!-- Bootstrap Icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
<!-- SimpleLightbox plugin CSS-->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Core theme CSS (includes Bootstrap)-->
<link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <!-- PWA  -->

    {{-- {!! NoCaptcha::renderJs() !!} --}}


    {{-- ------------------------------------------ --}}

</head>
<body id="page-top"  >
    <div id="app">
        @php
            $current_page =Route::currentRouteName();
        @endphp
        @if ($current_page != 'showSurgeries')
        <!-- Navigation desktop-->
            <nav class="navbar navbar-expand-lg d-none d-md-flex  navbar-dark bg-white fixed-top  py-1 navbar-shrink" style="max-height: 67.5px" id="mainNav">
                <div class="container px-2 px-lg-3  " style="display: inline-table">
                    <a class="navbar-brand mx-0" style="display:inline-grid;" href="{{ url('/') }}">
                        <span ><img src="{{asset('assets/img/hospital-name.png')}}" height="35px" alt="المشفى السوري التخصصي"></span>
                        <span class="text-dark text-xs mt-0"><b>{{Carbon\Carbon::now()->format('D d-m-Y')}} <span id="clock"></span></b></span>
                    </a>

                    @auth
                        <a class="btn btn-success my-1 py-2" style="direction:rtl;float: right;border-radius:0 50rem 50rem  0;/*height: 7.2vh;*/border: 0.5px solid #86af6d;" type="button"data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" >
                            <span class="navbar-toggler-icon" style="vertical-align: -webkit-baseline-middle;" ></span>
                        </a>
                        <div class="btn-group w-auto my-1"  style="float: right;">
                            <a class="btn btn-success dropdown-toggle mx-0 py-2" style="direction:rtl;border-radius: 50rem 0 0 50rem ; border: 0.5px solid #86af6d;" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" data-bs-auto-close="outside" >
                                <img class="rounded-circle " style="box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 1)" height="30" width="30" src="{{asset(auth()->user()->user_image)}}">
                                <span class="d-none d-sm-inline">{{auth()->user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm-start " style="direction:rtl; text-align:right;" aria-labelledby="dropdownMenuClickableOutside">

                                <li><a class="dropdown-item" href="{{route('surgeryTime')}}"><i class="fa-solid fa-heart-circle-bolt fa-lg text-info"></i> الصفحة الرئيسية</a></li>
                                <li><a class="dropdown-item"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-regular fa-calendar-days  fa-lg text-info"></i> الذهاب إلى تاريخ
                                </a></li>
                                <hr class="divider w-100 mx-0 mt-0 mb-1" />
                                @if (auth()->user()->grade != 'user' )
                                    <li><a class="dropdown-item" href="{{route('createSurgery')}}"><i class="fa-solid fa-heart-circle-plus fa-lg text-info"></i> إضافة عملية</a></li>
                                    @if (auth()->user()->grade == 'admin' )
                                        <li><a class="dropdown-item"  href="{{route('usersMang')}}"><i class="fa-solid fa-gear fa-lg text-info"></i> الإعداد</a></li>
                                    @endif
                                    <hr class="divider w-100 mx-0 mt-0 mb-1" />
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="fa-solid fa-arrow-right-from-bracket fa-lg text-danger"></i> تسجيل الخروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>

                    @else
                    <a href="{{ route('login') }}" class="btn btn-success rounded-pill my-2 py-2"  style="float: right">تسجيل الدخول</a>

                    @endauth
                </div>
            </nav>
        <!-- Navigation end desktop-->


        <!-- Navigation mobile-->

        <nav class="navbar navbar-expand-lg mx-3 px-2 fixed-bottom rounded-top d-md-none d-block navbar-dark bg-white" style="z-index: 99999999999999;">
            {{-- <div class="container-fluid d-inline-flex"> --}}
                <a class="navbar-brand mx-0" style="display:inline-grid;" href="{{ url('/') }}">
                    <span ><img src="{{asset('assets/img/hospital-name.png')}}" height="36px" alt="المشفى السوري التخصصي"></span>
                </a>
                @auth
                    <a class="btn btn-success rounded-pill p-1 mx-1" style="border: double;float: right" type="button"data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" >
                        <span class="navbar-toggler-icon" ></span>
                    </a>
                    <div class=" btn-group dropup"  style="float: right">
                        <a class="btn btn-success dropdown-toggle rounded-pill p-1" style="direction:rtl" type="button" id="home" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" data-bs-auto-close="outside" >
                            <img class="rounded-circle " style="box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 1)" height="30" width="30" src="{{asset(auth()->user()->user_image)}}">
                            {{-- <span class="d-none d-sm-inline">{{auth()->user()->name}}</span> --}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end " style="direction:rtl; text-align:right;" aria-labelledby="home">
                            <li>
                                <a class="dropdown-item" href="{{route('home')}}">
                                    <i class="fa-solid fa-heart-circle-bolt fa-md text-info"></i> الصفحة الرئيسية
                                </a>
                            </li>
                            <li>
                                <!-- date surgery modal -->
                                <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-regular fa-calendar-days  fa-md text-info"></i> الذهاب إلى تايخ
                                </a>
                            </li>
                            <hr class="divider w-100 mx-0 mt-0 mb-1" />
                            @if (auth()->user()->grade != 'user' )
                                <li>
                                    <a class="dropdown-item" type="button" href="{{route('createSurgery')}}">
                                        <i class="fa-solid fa-heart-circle-plus fa-md text-info"></i> إنشاء عملية
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->grade == 'admin' )
                                <li>
                                    <a class="dropdown-item"  href="{{route('usersMang')}}">
                                        <i class="fa-solid fa-gear fa-md text-info"></i> الإعداد
                                    </a>
                                </li>
                                <hr class="divider w-100 mx-0 mt-0 mb-1" />
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa-solid fa-arrow-right-from-bracket fa-lg text-danger"></i> تسجيل الخروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                @else
                    <a class="btn btn-success dropdown-toggle rounded-pill py-1 px-2" style="direction:rtl;border: double;float: right;" type="button" id="login" style="float: right" href="{{ route('login') }}">
                        <i class="fa-solid fa-arrow-right-to-bracket fa-lg text-light"></i>
                    </a>

                @endauth

            {{-- </div> --}}
        </nav>
            <!-- date surgery modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-body">
                        {{-- <h5 class="py-2 text-xs text-dark text-center fw-bolder">جدول بحسب التاريخ</h5> --}}
                    <form id="myForm" method="POST" action="{{route('surgeriesByDateRouteing')}}" style="direction: rtl">
                        @csrf
                        {{-- <input type="date"> --}}
                        <div class="row text-centet">
                            <div class="form-floating col-sm-12 mb-3">
                                <input id="myInput" class="form-control @error('date') is-invalid @enderror" type="date" name="date">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <label>تاريخ اليوم:</label>
                            </div>
                        </div>
                    </div>

                    {{-- <form id="myForm" action="submit.php" method="post">
                        <input type="text" id="myInput" placeholder="ادخل القيمة">
                    </form> --}}

                    <script>
                        document.getElementById('myInput').oninput = function() {
                            document.getElementById('myForm').submit(); // يقوم بعملية submit عند تغيير القيمة
                        };
                    </script>
                    {{-- <div class="modal-footer py-0">
                        <button type="button" class="btn btn-sm rounded-pill btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-sm rounded-pill btn-primary">الذهاب</button> --}}
                    </form>
                    {{-- </div> --}}
                </div>
                </div>
            </div><!-- date surgery end modal -->
        <!-- Navigation end mobile-->
        @endif



        <main >
            <div > @include('partial.flash') </div>
            @auth
                <div > @include('partial.sidebar') </div>
                @if ($current_page != 'showSurgeries')
                    <div class="d-none d-lg-flex d-md-flex" style="height: 67.5px"></div>
                @endif
            @endauth


            {{-- <div class="mt-5">&nbsp;</div> --}}
            @yield('content')
        </main>
        <!-- Footer-->
        <footer class="d-none d-lg-flex d-md-flex bg-light pb-4 pt-3">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Created By 3ZO (2024)</div></div>
        </footer>
        @auth
            @if ($current_page!= null &&(  $current_page == 'home' || $current_page == 'surgeriesByDate') )
            {{-- @dd($current_page) --}}
                <div class="d-xl-none d-lg-none  d-md-none d-sm-flex  d-flex @if (Carbon\Carbon::parse($date)->format('Y-m-d') < Carbon\Carbon::today()->format('Y-m-d') )
                    bg-secondary
                @elseif (Carbon\Carbon::parse($date)->format('Y-m-d') > Carbon\Carbon::today()->format('Y-m-d'))
                    bg-gray
                @else
                    bg-light
                @endif" style="height: 60px"></div>
            @endif
        @endauth
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}


    <!-- SimpleLightbox plugin JS-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script> --}}
    <!-- Core theme JS-->

    {{-- <script src="{{asset('assets/js/scripts.js')}}"></script> --}}
    <script src="{{asset('assets/js/custom.js')}}"></script>

    {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
</body>
</html>
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
