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

         pb-1 pb-md-5 "  style="min-height: 100vh;" id="about">
            <div class="text-center px-3 px-lg-5">
                <p class="text-dark fw-bolder mt-0 mb-1" style="direction:rtl">جدول عمليات<span class=""> بتاريخ: {{$date->format('D d-m-Y')}}</span></p>
                @if (Auth::check())
                    <div id="navShare" class = "a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" data-a2a-scroll-show = "0" style = " left : 0px ; bottom :60px ; " >
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_whatsapp"></a>
                            <a class="a2a_button_telegram"></a>
                            <a class="a2a_button_facebook_messenger"></a>
                    </div>
                    <a type="button" id="lastDate1" href="{{route('showSurgeries',$lastDate)}}" class="hiddenElem btn btn-outline-dark font-weight-bold mx-1">
                        <b><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal fa-lg "></i></b>
                    </a>
                @endif
                <a  id="captureButton" class="hiddenElem btn btn-outline-dark  font-weight-bold mx-1"  onclick="hiddenElem(),hiddenElem1()" >
                    <i class="fa-solid fa-camera-retro d-md-none d-sm-inline-flex fa-xl  shadow"></i>
                    <b> <span class="d-none d-md-inline-flex">إلتقاط صورة</span></b>
                </a>
                <a type="button" id="print" onclick="hiddenElem(),hiddenElem1()" class=" hiddenElem btn btn-outline-dark  font-weight-bold mx-1">
                    <i class="fa-solid fa-print d-md-none d-sm-inline-flex fa-xl  shadow"></i>
                    <b> <span class="d-none d-md-inline-flex">طباعة</span></b>
                </a>
                @if (Auth::check())
                    <a type="button" id="homeButton"  href="{{route('home')}}" class="hiddenElem btn btn-outline-dark  font-weight-bold mx-1">
                        <i class="d-md-none d-sm fa-solid fa-house fa-lg"></i>
                        <b><span class="d-none d-md-flex">الرئيسية</span></b>
                    </a>
                    <a type="button" id="nextDate1" href="{{route('showSurgeries',$nextDate)}}" class="hiddenElem btn btn-outline-dark font-weight-bold mx-1">
                        <b><i class="fa-solid fa-arrow-right-from-bracket fa-lg "></i></b>
                    </a>
                @endif

                <hr class="divider divider-dark my-2 w-100" />
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
        <script src="{{asset('assets/js/showPage.js')}}"></script>

    <!-- AddToAny BEGIN -->

    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <!-- AddToAny END -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@endsection
