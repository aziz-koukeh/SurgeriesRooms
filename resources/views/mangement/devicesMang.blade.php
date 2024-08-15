@extends('layouts.app')

@section('content')

<section class="page-section bg-light pb-1 ">
    <ul class="nav nav-tabs" style="direction: rtl">
        <li class="nav-item">
            <a class="nav-link" type="button" href="{{route('usersMang')}}">المستخدمين</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" type="button" href="{{route('employeesMang')}}">الموظفين</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" type="button" aria-current="page" >الأجهزة</a>
        </li>
    </ul>

    {{-- devices --}}
    <div class="py-2 mx-1 px-3 px-lg-4">
        <div class="row justify-content-center " style="direction: rtl">
            <div class="col-md-4 d-none d-md-block ">
                <div class="text-center">
                    <h4 class="mt-0 w-100" style="max-width: unset">إضافة جهاز</h4>
                    <hr class="divider w-100 mx-0 mt-0 mb-1" />
                </div>
                <form method="POST" action="{{ route('storeDevice') }}">
                    @csrf
                    <div class="form-row mt-3">
                        <div class="form-floating col-12 mb-3">
                            <select class="form-control " name="device_name" required >
                                <option value="قوسي" >جهاز قوسي</option>
                                <option value="تنظير">جهاز تنظير</option>
                                <option value="ضاغط الدم">ضاغط الدم</option>
                            </select>
                            <label>نوع الجهاز:</label>
                        </div>

                        <div class="form-floating col-12 mb-3">
                            <input class="form-control @error('device_number') is-invalid @enderror" name="device_number" type="text" required/>
                                @error('device_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>رقم الجهاز:</label>
                        </div>
                    </div>
                    <div class="form-floating col-12 mb-3">
                        <input class="form-control @error('device_info') is-invalid @enderror" name="device_info" type="text" />
                            @error('device_info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label>معلومات الجهاز:</label>
                    </div>

                    <div class="d-grid"><button class="btn btn-primary mb-3" type="submit">إضافة جهاز</button></div>
                </form>
            </div>

            <div class="col-md-4 d-md-none d-block my-1">
                <div class="accordion accordion-flush" id="devicesAccordion">
                    <div class="accordion-item" style="border-radius: 8px;border:1px solid gray">
                    <h2 class="accordion-header" id="devices-headingOne">
                        <button class="accordion-button collapsed text-center" style="border-radius: 8px;direction:ltr" type="button" data-bs-toggle="collapse" data-bs-target="#devices-collapseOne" aria-expanded="false" aria-controls="devices-collapseOne">
                            <h6 class="mt-0 w-100" style="max-width: unset">إضافة جهاز</h6>
                        </button>
                    </h2>
                    <div id="devices-collapseOne" class="accordion-collapse collapse" aria-labelledby="devices-headingOne" data-bs-parent="#devicesAccordion">
                        <div class="accordion-body" >
                            <form method="POST" action="{{ route('storeDevice') }}"  style="direction: rtl">
                                @csrf
                                <div class="form-row mt-3">
                                    <div class="form-floating col-12 mb-3">
                                        <div class="form-floating col-12 mb-3">
                                            <select class="form-control " name="device_name" required >
                                                <option value="قوسي" >جهاز قوسي</option>
                                                <option value="تنظير">جهاز تنظير</option>
                                                <option value="ضاغط الدم">ضاغط الدم</option>
                                            </select>
                                            <label>نوع الجهاز:</label>
                                        </div>
                                    </div>

                                    <div class="form-floating col-12 mb-3">
                                        <input class="form-control @error('device_number') is-invalid @enderror" name="device_number" type="text" />
                                            @error('device_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <label>رقم الجهاز:</label>
                                    </div>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <input class="form-control @error('device_info') is-invalid @enderror" name="device_info" type="text" />
                                        @error('device_info')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <label>معلومات الجهاز:</label>
                                </div>

                                <div class="d-grid"><button class="btn btn-primary mb-3" type="submit">إضافة جهاز</button></div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8  py-1" style="min-height:65vh" >
                <div class="card mb-sm-5" style="/*background-color: rgb(228 242 255)*/;min-height:65vh;">
                    <div id="carousel-devices" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators" style="direction: ltr">
                            @forelse ($devices as $device)
                                @if ($devices->count()> 1)
                                    <button type="button" data-bs-target="#carousel-devices" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : ''}}" aria-current="{{ $loop->index == 0 ? 'true' : ''}}" aria-label="Slide {{$loop->index}}"></button>
                                @endif
                            @empty
                            @endforelse
                        </div>
                        <div class="carousel-inner">
                            @forelse ($devices as $device)
                                <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}} mb-4">

                                    <div class="row justify-content-center">
                                        <div class="card shadow col-10 col-sm-6 bg-light my-3 mx-4  p-sm-2 p-3 " style="min-height:55vh">
                                            <div class="card my-1" >
                                                <div class="form-row mx-0" style="height: 100%">
                                                    <div class="col-12 " >
                                                        <div class="p-2 row justify-content-center">
                                                            <img  class="col-12 col-md-8 col-sm-8 col-lg-8 img-fluid" style="height: 30vh;object-fit: cover;" src="{{asset($device->device_image)}}" alt="...">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card py-1" style="min-height: 24vh">
                                                <div class="form-row mx-0" style="height: 100%">
                                                    <div class="col-12">
                                                        <div class="card-body px-2 py-1" style="direction:rtl;text-align:right">
                                                            <h6 class="card-title">نوع الجهاز: {{$device->device_name}}</h6>
                                                            <p class="card-text mb-0 text-xs fw-bolder">- رقم الجهاز: {{$device->device_number}}</p>
                                                            @if ($device->device_info)
                                                                <p class="card-text mb-0 text-xs fw-bolder">- حول الجهاز: {{$device->device_info}}</p>
                                                            @endif
                                                                <p class="card-text mb-0 text-xs fw-bolder">- حالة الجهاز:
                                                                    @if ($device->device_status == 1)
                                                                        <span class="text-success" >يعمل</span>
                                                                    @else
                                                                        <span class="text-danger" >متوقف</span>
                                                                    @endif
                                                                </p>
                                                            <p class="card-text mb-0 text-xs fw-bolder">- عدد أجهزة ال{{$device->device_name}} الجاهزة: {{count($devices->where('device_name',$device->device_name)->where('device_status',1))}}</p>
                                                            @if ( count($devices->where('device_name',$device->device_name)->where('device_status',0)) > 0)
                                                                <p class="card-text mb-0 text-xs fw-bolder">- عدد أجهزة ال{{$device->device_name}} المتوقفة: {{count($devices->where('device_name',$device->device_name)->where('device_status',0))}}</p>
                                                            @endif
                                                            <p class="card-text mb-0 text-xs fw-bolder"><small class="text-muted">- تاريخ الإضافة: {{$device->created_at->format('D d-m-Y')}}</small></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 w-100">
                                                        <a class="mx-2 mb-2 bg-light px-2 py-1 btn rounded-circle btn-circle shadow-sm" type="button" style="float: left"  data-bs-toggle="modal" data-bs-target="#delete-device{{$device->device_slug}}">
                                                            <i class="fa-solid text-danger fa-trash  fa-lg"></i>
                                                        </a>
                                                        <a class="mx-2 mb-2 bg-light px-2 py-1 btn rounded-circle btn-circle shadow-sm" type="button" style="float: right"  data-bs-toggle="modal" data-bs-target="#edit-device{{$device->device_slug}}">
                                                            <i class="fa-regular text-info fa-pen-to-square fa-lg"></i>
                                                        </a>
                                                        <!--delete Modal -->
                                                        <div class="modal fade" id="delete-device{{$device->device_slug}}" style="direction: ltr" tabindex="-1" aria-labelledby="delete-device{{$device->device_slug}}Label" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-body row ">
                                                                        <div class="col-4 text-center pb-3 pt-5 ">
                                                                            <i class="fa-regular fa-face-frown fa-rotate-by fa-2xl" style="--fa-rotate-angle: 335deg;font-size:100px"></i>
                                                                        </div>
                                                                        <div class="col-8 pb-4 pt-5 ">
                                                                            <p class="fw-bolder" style="text-align:center;direction:rtl">هل أنت متأكد من حذف الجهاز ؟؟</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer py-1  text-muted">
                                                                        <a href="{{route('deleteDevice',$device->device_slug)}}" type="button" class="btn btn-danger">تأكيد</a>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--edit Modal -->
                                                        <div class="modal fade" id="edit-device{{$device->device_slug}}" style="direction: ltr" tabindex="-1" aria-labelledby="edit-device{{$device->device_slug}}Label" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-body" style="direction: rtl">
                                                                        <div class="text-center">
                                                                            <h4 class="mt-0 w-100" style="max-width: unset">تعديل المعلومات</h4>
                                                                            <hr class="divider w-100 mx-0 mt-0 mb-1" />
                                                                        </div>
                                                                        <form method="POST" action="{{route('updateDevice',$device->device_slug)}}">
                                                                            @csrf
                                                                            <div class="form-row mt-3">
                                                                                <div class="form-floating col-6 mb-3">
                                                                                    <select class="form-control " name="device_name" required >
                                                                                        <option
                                                                                            @if ($device->device_name == 'قوسي')
                                                                                                selected
                                                                                            @endif
                                                                                        value="قوسي" >جهاز قوسي</option>
                                                                                        <option
                                                                                            @if ($device->device_name == 'تنظير')
                                                                                                selected
                                                                                            @endif
                                                                                        value="تنظير">جهاز تنظير</option>
                                                                                        <option
                                                                                            @if ($device->device_name == 'ضاغط الدم')
                                                                                                selected
                                                                                            @endif
                                                                                        value="ضاغط الدم">ضاغط الدم</option>
                                                                                    </select>
                                                                                    <label>نوع الجهاز:</label>
                                                                                </div>
                                                                                <div class="form-floating col-6 mb-3">
                                                                                    <select class="form-control" name="device_status" required >
                                                                                        <option
                                                                                            @if ($device->device_status == 1)
                                                                                                selected
                                                                                            @endif
                                                                                        value="1"  >جاهز</option>
                                                                                        <option
                                                                                            @if ($device->device_status == 0)
                                                                                                selected
                                                                                            @endif
                                                                                        value="0">متوقف</option>
                                                                                    </select>
                                                                                    <label>حالة الجهاز:</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-floating col-12 mb-3">
                                                                                <input class="form-control @error('device_number') is-invalid @enderror" name="device_number" type="text" value="{{$device->device_number}}" />
                                                                                    @error('device_number')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                <label>رقم الجهاز:</label>
                                                                            </div>
                                                                            <div class="form-floating col-12 mb-3">
                                                                                <input class="form-control @error('device_info') is-invalid @enderror" name="device_info" type="text" value="{{$device->device_info}}" />
                                                                                    @error('device_info')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                <label>معلومات الجهاز:</label>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer py-1">
                                                                        <button class="btn btn-primary " type="submit">تعديل المعلومات</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @empty
                                <div class="carousel-item active">
                                    <div class="card bg-secondary" style="height:100%;">

                                        <div class="card bg-light my-3 mx-4" style="height:60vh">
                                            <div class="text-center">
                                                <h4 class="my-5 w-100" style="max-width: unset"> لا يوجد أجهزة عمل بعد </h4>
                                                <hr class="divider divider-info w-100 mx-0 mt-0 mb-1" style="max-width: unset" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforelse

                        </div>
                        @if ($devices->count()> 1)

                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-devices" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-devices" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>



</section>


@endsection
