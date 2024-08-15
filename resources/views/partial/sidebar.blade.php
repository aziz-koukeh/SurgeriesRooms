@php
    $surgeriesNextDays = App\Models\Surgery::whereDate('surgery_time','>',date('Y-m-d'))->orderBy('surgery_time')->get();
@endphp


    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header bg-success" style="direction: rtl">
            <a type="button" style="float:right" href="{{route('createSurgery')}}" ><i class="fa-solid fa-heart-circle-plus  fa-2xl text-light"></i></a>
            <h5 class="offcanvas-title text-center w-100" id="offcanvasExampleLabel">العمليات المسجلة</h5>
            <button type="button" class="btn-close text-reset d-none d-sm-block" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @forelse ($surgeriesNextDays as $surgery)
                <div class="card text-center mb-2">
                    <div class="card-body" style="direction:rtl;text-align:right">
                        <a class="text-dark" style="float:left" href="{{route('editSurgery',$surgery->surgery_slug)}}" type="button"><i class="fa-regular text-info fa-pen-to-square fa-lg"></i></a>
                        <p class="card-text mb-0 text-lg fw-bolder">عملية: {{$surgery->surgery_name}}</p>
                        <p class="card-text mb-0 text-xs fw-bolder">- الطبيب: {{$surgery->doctor_name}}</p>
                        <p class="card-text mb-0 text-xs fw-bolder">- الغرفة:
                            @php
                                switch ($surgery->surgery_room) {
                                    case 'room_1':
                                        $roomName='عمليات 1';
                                        break;
                                    case 'room_2':
                                        $roomName='عمليات 2';
                                        break;
                                    case 'room_3':
                                        $roomName='عمليات 3';
                                        break;
                                    case 'room_b':
                                        $roomName='العظمية';
                                        break;
                                    case 'room_h':
                                        $roomName='القلبية';
                                        break;

                                }
                            @endphp
                            {{$roomName}}
                        </p>
                        @if ($surgery->assistant_surgeon)
                            <p class="card-text mb-0 text-xs fw-bolder">- المساعد: {{$surgery->assistant_surgeon}}</p>
                        @endif
                        @if ($surgery->anesthesia_technician)
                            <p class="card-text mb-0 text-xs fw-bolder">- الفني: {{$surgery->anesthesia_technician}}</p>
                        @endif
                        @if ($surgery->SurgeryDevices())
                        <p class="card-text mb-0 text-xs fw-bolder">- الأجهزة:
                            @forelse ($surgery->SurgeryDevices as $item)
                                 {{$item->device_name}}
                            @empty
                                لا يوجد
                            @endforelse
                        </p>
                        @endif
                        @if ($surgery->surgery_info)
                            <p class="card-text mb-0 text-xs fw-bolder">- ملاحظات {{$surgery->surgery_info}}</p>
                        @endif

                    </div>
                    <div class="card-footer text-muted">
                        <a type="button" style="float:left"  data-bs-toggle="modal" data-bs-target="#delete{{$surgery->surgery_slug}}">
                            <i class="fa-solid text-danger fa-trash  fa-lg"></i>
                        </a>
                        {{-- <a class="text-dark" style="float:left" href="{{route('editSurgery',$surgery->surgery_slug)}}" type="button"><i class="fa-solid text-danger fa-trash fa-lg"></i></a> --}}
                        <p class="m-0 text-xs fw-bold" style="text-align:right;direction:rtl">{{Carbon\Carbon::parse($surgery->surgery_time)->locale('ar')->diffForHumans()}}</p>
                        <div class="my-0 text-xs fw-bold d-inline-flex" style="text-align:right;float:right;direction:rtl"><p class="my-0">اليوم: {{Carbon\Carbon::parse($surgery->surgery_time)->format('D d-m-Y')}}</p>&nbsp; الساعة: <p class="my-0" style="direction: ltr;text-align:right">{{Carbon\Carbon::parse($surgery->surgery_time)->format('h:i a')}}</p></div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="delete{{$surgery->surgery_slug}}" style="direction: ltr" tabindex="-1" aria-labelledby="delete{{$surgery->surgery_slug}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body py-5 ">
                        <p style="text-align:center;direction:rtl">هل أنت متأكد من حذف عملية {{$surgery->surgery_name}} للطبيب {{$surgery->doctor_name}} ؟؟</p>
                        </div>
                        <div class="modal-footer py-1">
                            <a href="{{route('deleteSurgery',$surgery->surgery_slug)}}" type="button" class="btn btn-danger">تأكيد</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        </div>
                    </div>
                    </div>
                </div>
            @empty
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">لا يوجد عمليات مسجلة بعد</h5>
                </div>
            </div>

            @endforelse
        </div>
    </div>
