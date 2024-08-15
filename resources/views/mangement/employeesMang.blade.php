@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Str ;
@endphp
<section class="page-section bg-light pb-1 ">
    <ul class="nav nav-tabs" style="direction: rtl">
        <li class="nav-item">
            <a class="nav-link" type="button" href="{{route('usersMang')}}">المستخدمين</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" type="button" aria-current="page" >الموظفين</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" type="button" href="{{route('devicesMang')}}">الأجهزة</a>
        </li>
    </ul>
        {{-- employees --}}

    <div class="py-2 mx-1 px-3 px-lg-4">
        <div class="row justify-content-center " style="direction: rtl">
            <div class="col-md-4 d-none d-md-block ">
                <div class="text-center">
                    <h4 class="mt-0 w-100" style="max-width: unset">إضافة موظف</h4>
                    <hr class="divider w-100 mx-0 mt-0 mb-1" />
                </div>
                <form method="POST" action="{{ route('storeEmployee') }}">
                    @csrf
                    <div class="form-row mt-3">
                        <div class="form-floating col-12 mb-3">
                            <input class="form-control @error('employee_name') is-invalid @enderror" name="employee_name" type="text" required/>
                                @error('employee_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>اسم الموظف:</label>
                        </div>

                        <div class="form-floating col-12 mb-3">
                            <select class="form-control " name="employee_speciality" required >
                                <option value="مساعد جراح">مساعد جراح</option>
                                <option value="فني تخدير">فني تخدير</option>
                                <option value="طبيب جراح">طبيب جراح</option>
                                <option value="طبيب تخدير">طبيب تخدير</option>
                                <option value="إداري">إداري</option>
                            </select>
                            <label>إختصاص الموظف :</label>
                        </div>
                    </div>
                    <div class="form-floating col-12 mb-3">
                        <input class="form-control @error('employee_bio') is-invalid @enderror" name="employee_bio" type="text" />
                            @error('employee_bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label>حول الموظف:</label>
                    </div>

                    <div class="d-grid"><button class="btn btn-primary mb-3" type="submit">إضافة ملف</button></div>
                </form>
            </div>

            <div class="col-md-4 d-md-none d-block my-1">
                <div class="accordion accordion-flush" id="employeesAccordion">
                    <div class="accordion-item" style="border-radius: 8px;border:1px solid gray">
                    <h2 class="accordion-header" id="employees-headingOne">
                        <button class="accordion-button collapsed text-center" style="border-radius: 8px;direction:ltr" type="button" data-bs-toggle="collapse" data-bs-target="#employees-collapseOne" aria-expanded="false" aria-controls="employees-collapseOne">
                            <h6 class="mt-0 w-100" style="max-width: unset">إضافة موظف</h6>
                        </button>
                    </h2>
                    <div id="employees-collapseOne" class="accordion-collapse collapse" aria-labelledby="employees-headingOne" data-bs-parent="#employeesAccordion">
                        <div class="accordion-body" >
                            <form method="POST" action="{{ route('storeEmployee') }}" style="direction: rtl">
                                @csrf
                                <div class="form-row mt-3">
                                    <div class="form-floating col-12 mb-3">
                                        <input class="form-control @error('employee_name') is-invalid @enderror" name="employee_name" type="text" required/>
                                            @error('employee_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <label>اسم الموظف:</label>
                                    </div>

                                    <div class="form-floating col-12 mb-3">
                                        <select class="form-control " name="employee_speciality" required >
                                            <option ></option>
                                            <option value="طبيب جراح">طبيب جراح</option>
                                            <option value="طبيب تخدير">طبيب تخدير</option>
                                            <option value="مساعد جراح">مساعد جراح</option>
                                            <option value="فني تخدير">فني تخدير</option>
                                            <option value="إداري">إداري</option>
                                        </select>
                                        <label>إختصاص الموظف :</label>
                                    </div>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <input class="form-control @error('employee_bio') is-invalid @enderror" name="employee_bio" type="text" />
                                        @error('employee_bio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <label>حول الموظف:</label>
                                </div>

                                <div class="d-grid"><button class="btn btn-primary mb-3" type="submit">إضافة ملف</button></div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8  py-1" style="min-height:65vh" >
                <div class="card mb-sm-5 p-0 " style="/*background-color: rgb(228 242 255)*/;min-height:65vh;">
                    <div id="carousel-employees" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators" style="direction: ltr">
                            @forelse ($employees as $employee)
                                @if ($employees->count()> 1)
                                    <button type="button" data-bs-target="#carousel-employees" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : ''}}" aria-current="{{ $loop->index == 0 ? 'true' : ''}}" aria-label="Slide {{$loop->index}}"></button>
                                @endif
                            @empty
                            @endforelse
                        </div>
                        <div class="carousel-inner">
                            @forelse ($employees as $employee)
                                <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}} mb-4">

                                    <div class="row justify-content-center">
                                        <div class="card shadow col-10 col-sm-6 bg-light my-3 mx-4  p-sm-2 p-3 " style="min-height:55vh">
                                            <div class="card my-1" >
                                                <div class="form-row mx-0" style="height: 100%">
                                                    <div class="col-12 " >
                                                        <div class="p-2 row justify-content-center">
                                                            <img  class="col-12 col-md-8 col-sm-8 col-lg-8 img-fluid" style="height: 25vh;object-fit: cover;" src="{{asset($employee->employee_image)}}" alt="...">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card py-1" style="min-height: 24vh">
                                                <div class="form-row mx-0" style="height: 100%">
                                                    <div class="col-12">
                                                        <div class="card-body px-2 py-3" style="direction:rtl;text-align:right">
                                                            <h6 class="card-title">اسم الموظف: {{$employee->employee_name}}</h6>
                                                            <p class="card-text mb-0 text-xs fw-bolder">- إختصاص الموظف: {{$employee->employee_speciality}}</p>
                                                            @if ($employee->employee_bio)
                                                                <p class="card-text mb-0 text-xs fw-bolder">- حول الموظف: {{$employee->employee_bio}}</p>
                                                            @endif
                                                            <p class="card-text mb-0 text-xs fw-bolder"><small class="text-muted">- تاريخ الإنضمام: {{$employee->created_at->format('D d-m-Y')}}</small></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 w-100">
                                                        <div class="mx-2 text-center">
                                                            <a class="mb-2 bg-light px-3 py-1 rounded-end btn-light " style="box-shadow:0 0.3rem 0.5rem rgb(92 163 179 / 45%)" type="button"  data-bs-toggle="modal" data-bs-target="#delete-employee{{$employee->employee_slug}}">
                                                                <i class="fa-solid text-danger fa-trash  fa-lg"></i>
                                                            </a>
                                                            {{-- زر تحويل الملف إلى حساب --}}
                                                            @php
                                                                $user= App\Models\User::where('name', $employee->employee_name)->first();
                                                            @endphp
                                                            @if (!$user)

                                                                <a class="mb-2 bg-light px-3 py-1 btn-light " style="box-shadow:0 0.3rem 0.5rem rgb(92 163 179 / 45%)" type="button" data-bs-toggle="modal" data-bs-target="#create-user{{$employee->employee_slug}}" >
                                                                    <i class="fa-solid text-success fa-person-through-window fa-lg"></i>
                                                                </a>
                                                            @endif
                                                            <a class="mb-2 bg-light px-3 py-1 rounded-start btn-light " style="box-shadow:0 0.3rem 0.5rem rgb(92 163 179 / 45%)" type="button"  data-bs-toggle="modal" data-bs-target="#edit-employee{{$employee->employee_slug}}">
                                                                <i class="fa-regular text-info fa-pen-to-square fa-lg"></i>
                                                            </a>
                                                        </div>
                                                        @if (!$user)
                                                            <!--create Modal -->
                                                            <div class="modal fade" id="create-user{{$employee->employee_slug}}" style="direction: ltr" tabindex="-1" aria-labelledby="create-user{{$employee->employee_slug}}Label" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body" style="direction: rtl">
                                                                            <div class="text-center">
                                                                                <h4 class="mt-0 w-100" style="max-width: unset">إنشاء الحساب</h4>
                                                                                <hr class="divider w-100 mx-0 mt-0 mb-1" />
                                                                            </div>
                                                                            <form method="POST" action="{{route('createAccount',$employee->employee_slug)}}">
                                                                                @csrf
                                                                                <div class="form-row">

                                                                                    <div class="form-floating col-6 my-3">
                                                                                        <input class="form-control @error('username') is-invalid @enderror" name="username" type="text" required value="{{Str::slug($employee->employee_name)}}"  />
                                                                                            @error('username')
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        <label>اسم الحساب:</label>
                                                                                    </div>
                                                                                    <div class="form-floating col-6 my-3">
                                                                                        <select class="form-control @error('grade') is-invalid @enderror" name="grade" required>
                                                                                            <option value="user">مستخدم</option>
                                                                                            <option value="editor">مشرف</option>
                                                                                            <option value="admin">مدير</option>
                                                                                        </select>
                                                                                            @error('grade')
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        <label >مستوى الحساب:</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-floating col-6 mb-3">
                                                                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"  autocomplete="new-password" required />
                                                                                            @error('password')
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                            @enderror
                                                                                        <label >كلمة المرور:</label>
                                                                                    </div>
                                                                                    <div class="form-floating col-6 mb-3">
                                                                                        <input class="form-control " type="password" name="password_confirmation" autocomplete="new-password" required />

                                                                                        <label>تأكيد كلمة المرور:</label>
                                                                                    </div>
                                                                                </div>

                                                                        </div>
                                                                        <div class="modal-footer py-1">
                                                                            <button class="btn btn-primary " type="submit">تعديل الحساب</button>
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <!--delete Modal -->
                                                        <div class="modal fade" id="delete-employee{{$employee->employee_slug}}" style="direction: ltr" tabindex="-1" aria-labelledby="delete-employee{{$employee->employee_slug}}Label" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    @if (auth()->user()->name == $employee->employee_name)
                                                                        <div class="modal-body row ">
                                                                            <div class="col-4 text-center pb-3 pt-5 ">
                                                                                <i class="fa-regular fa-face-smile fa-rotate-by fa-2xl" style="font-size:100px"></i>
                                                                            </div>
                                                                            <div class="col-8 pb-4 pt-5 ">
                                                                                <p class="fw-bolder" style="text-align:center;direction:rtl">لا يمكنك حذف الملف.. راجع المسؤول</p>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="modal-body row ">
                                                                            <div class="col-4 text-center pb-3 pt-5 ">
                                                                                <i class="fa-regular fa-face-frown fa-rotate-by fa-2xl" style="--fa-rotate-angle: 335deg;font-size:100px"></i>
                                                                            </div>
                                                                            <div class="col-8 pb-4 pt-5 ">
                                                                                <p class="fw-bolder" style="text-align:center;direction:rtl">هل أنت متأكد من حذف الملف ؟؟</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer py-1  text-muted">
                                                                            <a href="{{route('deleteEmployee',$employee->employee_slug)}}" type="button" class="btn btn-danger">تأكيد</a>
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                                        </div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--edit Modal -->
                                                        <div class="modal fade" id="edit-employee{{$employee->employee_slug}}" style="direction: ltr" tabindex="-1" aria-labelledby="delete-employee{{$employee->employee_slug}}Label" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-body" style="direction: rtl">
                                                                        <div class="text-center">
                                                                            <h4 class="mt-0 w-100" style="max-width: unset">تعديل المعلومات</h4>
                                                                            <hr class="divider w-100 mx-0 mt-0 mb-1" />
                                                                        </div>
                                                                        <form method="POST" action="{{route('updateEmployee',$employee->employee_slug)}}">
                                                                            @csrf
                                                                            <div class="form-row mt-3">
                                                                                <div class="form-floating col-12 mb-3">
                                                                                    <input class="form-control @error('employee_name') is-invalid @enderror" name="employee_name" value="{{$employee->employee_name}}" type="text" required/>
                                                                                        @error('employee_name')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    <label>اسم الموظف:</label>
                                                                                </div>

                                                                                <div class="form-floating col-12 mb-3">

                                                                                    <select class="form-control " name="employee_speciality" required >
                                                                                        <option
                                                                                            @if ($employee->employee_speciality == "طبيب جراح")
                                                                                                selected
                                                                                            @endif
                                                                                        value="طبيب جراح">طبيب جراح</option>
                                                                                        <option
                                                                                            @if ($employee->employee_speciality == "طبيب تخدير")
                                                                                                selected
                                                                                            @endif
                                                                                        value="طبيب تخدير">طبيب تخدير</option>
                                                                                        <option
                                                                                            @if ($employee->employee_speciality == "مساعد جراح")
                                                                                                selected
                                                                                            @endif
                                                                                        value="مساعد جراح">مساعد جراح</option>
                                                                                        <option
                                                                                            @if ($employee->employee_speciality == "فني تخدير")
                                                                                                selected
                                                                                            @endif
                                                                                        value="فني تخدير">فني تخدير</option>
                                                                                        <option
                                                                                            @if ($employee->employee_speciality == "إداري")
                                                                                                selected
                                                                                            @endif
                                                                                        value="إداري">إداري</option>
                                                                                    </select>
                                                                                    <label>إختصاص الموظف :</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-floating col-12 mb-3">
                                                                                <input class="form-control @error('employee_bio') is-invalid @enderror" name="employee_bio" type="text"  value="{{$employee->employee_bio}}"/>
                                                                                    @error('employee_bio')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                <label>حول الموظف:</label>
                                                                            </div>



                                                                    </div>
                                                                    <div class="modal-footer py-1">
                                                                        <button class="btn btn-primary " type="submit">تعديل الملف</button>
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
                                    <div class="card bg-secondary" style="height:100%">

                                        <div class="card bg-light my-3 mx-4" style="height:60vh">
                                            <div class="text-center">
                                                <h4 class="my-5 w-100" style="max-width: unset"> لا يوجد ملفات موظفين بعد </h4>
                                                <hr class="divider divider-info w-100 mx-0 mt-0 mb-1" style="max-width: unset" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforelse

                        </div>
                        @if ($employees->count()> 1)

                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-employees" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-employees" data-bs-slide="next">
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
