@extends('layouts.app')

@section('content')




<section class="page-section bg-dark pb-1 pb-md-4" style="min-height: 100vh;padding-top: 10vh;">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0 text-light">تعديل العملية</h2>
                <hr class="divider" />
                {{--  <p class="text-muted mb-5">Ready to start your next project with us? Send us a messages and we will get back to you as soon as possible!</p>  --}}
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-12">
                <form  method="POST" action="{{ route('updateSurgery',$surgery->surgery_slug )}}" style="direction: rtl">
                        @csrf
                    <div class="form-row">
                        <div class="form-floating col-6 mb-3">
                            <input class="form-control @error('surgery_name') is-invalid @enderror" name="surgery_name" type="text" value="{{$surgery->surgery_name}}" required>
                                @error('surgery_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>اسم العملية:</label>
                        </div>

                        <div class="form-floating col-6 mb-3">
                            <input class="form-control @error('doctor_name') is-invalid @enderror" name="doctor_name" type="text"  value="{{$surgery->doctor_name}}" required>
                                @error('doctor_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>اسم الطبيب:</label>
                        </div>
                    </div>
                    <div class="row" style="--bs-gutter-x: 0.5rem;">
                        <div class="form-floating col-sm-6 mb-3">
                            <select class="form-control @error('surgery_room') is-invalid @enderror" name="surgery_room" >
                                <option
                                    @if ($surgery->surgery_room == "room_1")
                                        selected
                                    @endif
                                value="room_1">العمليات 1</option>
                                <option
                                    @if ($surgery->surgery_room == "room_2")
                                        selected
                                    @endif
                                value="room_2">العمليات 2</option>
                                <option
                                    @if ($surgery->surgery_room == "room_3")
                                        selected
                                    @endif
                                value="room_3">العمليات 3</option>
                                <option
                                    @if ($surgery->surgery_room == "room_b")
                                        selected
                                    @endif
                                value="room_b">العظمية</option>
                                <option
                                    @if ($surgery->surgery_room == "room_h")
                                        selected
                                    @endif
                                value="room_h">القلبية</option>
                            </select>
                                @error('surgery_room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>غرفة العمليات:</label>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-row">

                                <div class="form-floating col-4 mb-3">
                                    @php
                                        $start=Carbon\Carbon::parse($surgery->surgery_time)->format('H');
                                        $end=Carbon\Carbon::parse($surgery->surgery_term)->format('H');
                                        $limit=$end  - $start +1 ;

                                    @endphp
                                    <input class="form-control text-center @error('surgery_term') is-invalid @enderror" type="tel" min="1" max="10" name="surgery_term" value="{{$limit}}" required />
                                        @error('surgery_term')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <label>المدة:</label>
                                </div>

                                <div class="form-floating col-8 mb-3">
                                    <input class="form-control @error('surgery_time') is-invalid @enderror" min="/*{{Carbon\Carbon::today()->format('Y-m-d\TH:i')}}*/" type="datetime-local" name="surgery_time" value="{{$surgery->surgery_time}}" required>
                                        @error('surgery_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <label>وقت العملية:</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="--bs-gutter-x: 0.5rem;">
                        <div class="col-sm-6 ">
                            <div class="form-row">
                                <div class="form-floating col-6 mb-3" >
                                    <select class="form-control" name="assistant_surgeon">
                                        <option value=""></option>
                                        @foreach ($employees1 as $employee1)
                                            <option
                                            @if ($surgery->assistant_surgeon == $employee1->employee_name )
                                                selected
                                            @endif
                                             value="{{$employee1->employee_name}}">{{$employee1->employee_name}}</option>
                                        @endforeach
                                    </select>
                                    <label>مساعد الجراح:</label>
                                </div>

                                <div class="form-floating col-6 mb-3">
                                    <select class="form-control" name="anesthesia_technician">
                                        <option value=""></option>
                                        @foreach ($employees2 as $employee2)
                                            <option
                                            @if ($surgery->anesthesia_technician == $employee2->employee_name )
                                                selected
                                            @endif
                                            value="{{$employee2->employee_name}}">{{$employee2->employee_name}}</option>
                                        @endforeach
                                    </select>
                                    <label>فني التخدير:</label>
                                </div>

                            </div>
                        </div>
                        <div class="form-floating col-sm-6 mb-3">
                                <div class="card  form-control"  style="display: -webkit-inline-box ;height: 58px;width: 100%;direction:rtl">
                                    @if ($devices1 >0)
                                        <div class="custom-control custom-checkbox custom-control-inline mx-2" style="direction: ;text-align:right">
                                            <input type="checkbox" id="device1" name="surgery_device[]"  value="قوسي" class="custom-control-input mx-1"
                                            @foreach ($surgery->SurgeryDevices as $item)
                                                @if ($item->device_name == "قوسي")
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                            <label class="text-xs text-dark font-weight-bold custom-control-label" for="device1" >جهاز قوسي</label>
                                        </div>
                                    @endif
                                    @if ($devices2 >0)
                                        <div class="custom-control custom-checkbox custom-control-inline" style="direction: ;text-align:right">
                                            <input type="checkbox" id="device2" name="surgery_device[]" value="تنظير" class="custom-control-input mx-1"
                                                @foreach ($surgery->SurgeryDevices as $item)
                                                    @if ($item->device_name == "تنظير")
                                                        checked
                                                    @endif
                                                @endforeach
                                            >
                                            <label class="text-xs text-dark font-weight-bold custom-control-label" for="device2s" >جهاز تنظير</label>
                                        </div>
                                    @endif
                                    @if ($devices3 >0)
                                        <div class="custom-control custom-checkbox custom-control-inline" style="direction: ;text-align:right">
                                            <input type="checkbox" id="device3" name="surgery_device[]"  value="ضاغط الدم" class="custom-control-input mx-1"
                                            @foreach ($surgery->SurgeryDevices as $item)
                                                @if ($item->device_name =="ضاغط الدم")
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                            <label class="text-xs text-dark font-weight-bold custom-control-label" for="device3" >جهاز كاروي</label>
                                        </div>
                                    @endif
                                </div>
                            <label>أدوات العملية:</label>
                        </div>

                    </div>
                    <div class="form-floating col-sm-12 mb-3">
                            <input class="form-control @error('surgery_info') is-invalid @enderror" name="surgery_info" type="text" value="{{$surgery->surgery_info}}" />
                                @error('surgery_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>ملاحظات العملية:</label>
                        </div>
                    <div class="d-grid"><button class="btn btn-primary btn-xl" type="submit">تعديل العملية</button></div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection
