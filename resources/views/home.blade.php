@extends('layouts.app')

@section('content')
    @php
        use Carbon\Carbon;
        $lastDate=Carbon::parse($date)->subDay()->format('d-m-Y');
        $nextDate=Carbon::parse($date)->addDay()->format('d-m-Y');
        $current_page =Route::currentRouteName();
    @endphp


        <!-- About-->
        <section class="page-section
        @if (Carbon::parse($date)->format('Y-m-d') < Carbon::today()->format('Y-m-d') )
            bg-secondary
        @elseif (Carbon::parse($date)->format('Y-m-d') > Carbon::today()->format('Y-m-d'))
            bg-gray
        @else
            bg-light
        @endif
        pb-1 pb-md-5 " style="min-height: 100vh;" id="about">
            <div class="text-center  px-3 px-lg-5">

                <p class="text-dark fw-bolder mt-0 mb-1" style="direction:rtl">جدول عمليات<span class=""> بتاريخ: {{$date->format('D d-m-Y')}}</span></p>

                <a type="button" id="lastDate1" href="{{route('surgeriesByDate',$lastDate)}}" class="btn btn-outline-dark font-weight-bold mx-1"><b><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal fa-lg"></i></b></a>

                <a href="{{route('showSurgeries',Carbon::parse($date)->format('d-m-Y'))}}" class="btn btn-outline-dark font-weight-bold mx-1">
                    <i class="fa-solid fa-cloud-arrow-down d-md-none d-sm-inline-flex fa-xl  shadow"></i>
                    <b><span class="d-none d-md-inline-flex">إستخراج</span></b>
                </a>

                <a type="button" id="nextDate1" href="{{route('surgeriesByDate',$nextDate)}}" class="btn btn-outline-dark font-weight-bold mx-1"><b><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i></b></a>

                <hr class="divider divider-light my-2 w-100" />
                <div class="table-responsive table-container  text-center" style="direction: rtl">
                    <table  id="scrolling-table" class="table table-hover  table-bordered bg-light">
                        <thead class="table-active">
                            <tr class="table-primary text-light">
                                <th style="width:40px">التوقيت</th>
                                <th style="min-width: 100px;">العمليات 1</th>
                                <th style="min-width: 100px;">العمليات 2</th>
                                <th style="min-width: 100px;">العمليات 3</th>
                                <th style="min-width: 100px;">العظمية</th>
                                <th style="min-width: 100px;">القلبية</th>
                            </tr>
                        </thead>
                            @php
                                $myClass = new App\partial\tableFields();
                                $feildsValues= $myClass->feildsValues($surgeries );
                                $feildLimit=$feildsValues['feildLimit'];
                                $feildLocations=$feildsValues['feildLocations'];
                                $showRow =$myClass->showRow($feildLimit);
                            @endphp
                        <tbody style="vertical-align: middle;font-weight: bolder;">


                            @if ($showRow[0] == 1)
                                @include('surgeryHours.clock00')
                            @endif
                            @if ($showRow[1] == 1)
                                @include('surgeryHours.clock01')
                            @endif
                            @if ($showRow[2] == 1)
                                @include('surgeryHours.clock02')
                            @endif
                            @if ($showRow[3] == 1)
                                @include('surgeryHours.clock03')
                            @endif
                            @if ($showRow[4] == 1)
                                @include('surgeryHours.clock04')
                            @endif
                            @if ($showRow[5] == 1)
                                @include('surgeryHours.clock05')
                            @endif
                            @if ($showRow[6] == 1)
                                @include('surgeryHours.clock06')
                            @endif
                            @if ($showRow[7] == 1)
                                @include('surgeryHours.clock07')
                            @endif
                            {{-- @if ($showRow[8] == 1) --}}
                                @include('surgeryHours.clock08')
                            {{-- @endif
                            @if ($showRow[9] == 1) --}}
                                @include('surgeryHours.clock09')
                            {{-- @endif
                            @if ($showRow[10] == 1) --}}
                                @include('surgeryHours.clock10')
                            {{-- @endif
                            @if ($showRow[11] == 1) --}}
                                @include('surgeryHours.clock11')
                            {{-- @endif
                            @if ($showRow[12] == 1) --}}
                                @include('surgeryHours.clock12')
                            {{-- @endif
                            @if ($showRow[13] == 1) --}}
                                @include('surgeryHours.clock13')
                            {{-- @endif
                            @if ($showRow[14] == 1) --}}
                                @include('surgeryHours.clock14')
                            {{-- @endif --}}
                            @if ($showRow[15] == 1)
                                @include('surgeryHours.clock15')
                            @endif
                            @if ($showRow[16] == 1)
                                @include('surgeryHours.clock16')
                            @endif
                            @if ($showRow[17] == 1)
                                @include('surgeryHours.clock17')
                            @endif
                            @if ($showRow[18] == 1)
                                @include('surgeryHours.clock18')
                            @endif
                            @if ($showRow[19] == 1)
                                @include('surgeryHours.clock19')
                            @endif
                            @if ($showRow[20] == 1)
                                @include('surgeryHours.clock20')
                            @endif
                            @if ($showRow[21] == 1)
                                @include('surgeryHours.clock21')
                            @endif
                            @if ($showRow[22] == 1)
                                @include('surgeryHours.clock22')
                            @endif
                            @if ($showRow[23] == 1)
                                @include('surgeryHours.clock23')
                            @endif

                    </table>
                </div>



            </div>
        </section>
        {{-- <a class="btn btn-light btn-xl" href="#services">العمليات المسجلة!</a> --}}
        <!-- Services-->
        {{--  <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">At Your Service</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Sturdy Themes</h3>
                            <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Ready to Publish</h3>
                            <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Made with Love</h3>
                            <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>  --}}
        {{--  <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg" title="Project Name">
                            <img class="img-fluid" src="{{asset('assets/assets/img/portfolio/thumbnails/1.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg" title="Project Name">
                            <img class="img-fluid" src="{{asset('assets/assets/img/portfolio/thumbnails/2.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg" title="Project Name">
                            <img class="img-fluid" src="{{asset('assets/assets/img/portfolio/thumbnails/3.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg" title="Project Name">
                            <img class="img-fluid" src="{{asset('assets/assets/img/portfolio/thumbnails/4.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg" title="Project Name">
                            <img class="img-fluid" src="{{asset('assets/assets/img/portfolio/thumbnails/5.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg" title="Project Name">
                            <img class="img-fluid" src="{{asset('assets/assets/img/portfolio/thumbnails/6.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>  --}}
        {{--  <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
                <a class="btn btn-light btn-xl" href="#">Download Now!</a>
            </div>
        </section>  --}}
        <!-- Contact-->



@endsection
