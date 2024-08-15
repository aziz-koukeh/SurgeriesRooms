@extends('layouts.app')

@section('content')

<section class="page-section bg-light pb-1 ">
    <ul class="nav nav-tabs" style="direction: rtl">
        <li class="nav-item">
            <a class="nav-link active" type="button" aria-current="page" >المستخدمين</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" type="button" href="{{route('employeesMang')}}">الموظفين</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" type="button" href="{{route('devicesMang')}}">الأجهزة</a>
        </li>
    </ul>

    {{-- user --}}

    <div class="py-2 mx-1 px-3 px-lg-4">

        <div class="row justify-content-center " style="direction: rtl;padding-bottom: 4rem">

            <div class="col-md-4 d-none d-md-block ">
                <div class="text-center">
                    <h4 class="mt-0 w-100" style="max-width: unset">إضافة مستخدم</h4>
                    <hr class="divider w-100 mx-0 mt-0 mb-1" />
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-floating col-6 mb-3">
                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" required />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>اسم المستخدم:</label>
                        </div>

                        <div class="form-floating col-6 mb-3">
                            <input class="form-control @error('username') is-invalid @enderror" name="username" type="text"  required />
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>اسم الحساب:</label>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-floating col-6 mb-3">
                            <select class="form-control @error('grade') is-invalid @enderror" name="grade" required>
                                <option selected value="user">مستخدم</option>
                                <option value="editor">مشرف</option>
                                <option value="admin">مدير</option>
                            </select>
                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>مستوى الحساب:</label>
                        </div>
                        <div class="form-floating col-6 mb-3">
                            <select class="form-control " name="user_speciality" required >
                                <option ></option>
                                <option value="طبيب جراح">طبيب جراح</option>
                                <option value="طبيب تخدير">طبيب تخدير</option>
                                <option value="مساعد جراح">مساعد جراح</option>
                                <option value="فني تخدير">فني تخدير</option>
                                <option value="إداري">إداري</option>
                            </select>
                            <label>الإختصاص:</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-floating col-6 mb-3">
                            <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"  required autocomplete="new-password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>كلمة المرور:</label>
                        </div>
                        <div class="form-floating col-6 mb-3">
                            <input class="form-control " type="password" name="password_confirmation" required autocomplete="new-password"  />

                            <label>تأكيد كلمة المرور:</label>
                        </div>
                    </div>
                    <div class="form-floating col-sm-12 mb-3">
                        <input class="form-control @error('bio') is-invalid @enderror" name="bio" type="text" />
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label>حول المستخدم:</label>
                    </div>

                    <div class="d-grid"><button class="btn btn-primary mb-3" type="submit">إضافة حساب</button></div>
                </form>
            </div>

            <div class="col-md-4 d-md-none d-block my-1">
                <div class="accordion accordion-flush" id="usersAccordion">
                    <div class="accordion-item" style="border-radius: 8px;border:1px solid gray">
                    <h2 class="accordion-header" id="users-headingOne">
                        <button class="accordion-button collapsed text-center" style="border-radius: 8px;direction:ltr" type="button" data-bs-toggle="collapse" data-bs-target="#users-collapseOne" aria-expanded="false" aria-controls="users-collapseOne">
                            <h6 class="mt-0 w-100" style="max-width: unset">إضافة مستخدم</h6>
                        </button>
                    </h2>
                    <div id="users-collapseOne" class="accordion-collapse collapse" aria-labelledby="users-headingOne" data-bs-parent="#usersAccordion">
                        <div class="accordion-body">
                            <form method="POST" action="{{ route('register') }}" style="direction: rtl">
                                @csrf
                                <div class="form-row">
                                    <div class="form-floating col-6 mb-3">
                                        <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" required/>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <label>اسم المستخدم:</label>
                                    </div>

                                    <div class="form-floating col-6 mb-3">
                                        <input class="form-control @error('username') is-invalid @enderror" name="username" type="text" required  />
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <label>اسم الحساب:</label>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-floating col-6 mb-3">
                                        <select class="form-control @error('grade') is-invalid @enderror" name="grade" required>
                                            <option selected value="user">مستخدم</option>
                                            <option value="editor">مشرف</option>
                                            <option value="admin">مدير</option>
                                        </select>
                                            @error('grade')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <label>مستوى الحساب:</label>
                                    </div>
                                    <div class="form-floating col-6 mb-3">
                                        <select class="form-control " name="user_speciality" required >
                                            <option ></option>
                                            <option value="طبيب جراح">طبيب جراح</option>
                                            <option value="طبيب تخدير">طبيب تخدير</option>
                                            <option value="مساعد جراح">مساعد جراح</option>
                                            <option value="فني تخدير">فني تخدير</option>
                                            <option value="إداري">إداري</option>
                                        </select>
                                        <label>الإختصاص:</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-floating col-6 mb-3">
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"  required autocomplete="new-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <label>كلمة المرور:</label>
                                    </div>
                                    <div class="form-floating col-6 mb-3">
                                        <input class="form-control " type="password" name="password_confirmation" required autocomplete="new-password"  />

                                        <label>تأكيد كلمة المرور:</label>
                                    </div>
                                </div>
                                <div class="form-floating col-sm-12 mb-3">
                                    <input class="form-control @error('bio') is-invalid @enderror" name="bio" type="text" />
                                        @error('bio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <label>حول المستخدم:</label>
                                </div>

                                <div class="d-grid"><button class="btn btn-primary mb-3" type="submit">إضافة حساب</button></div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8  py-1" style="height:70vh" >
                <hr class="divider w-100 m-0" style="max-width: unset" />
                <div class="bg-white" style="overflow-y:auto;height:100%;width: 100%;">
                    <div class="form-row mx-0  justify-content-center py-2">
                        @forelse ($users as $user)
                            <div class="col-md-6 col-sm-4">
                                <div class="card my-1" style="height: auto">
                                    <div class="form-row  justify-content-center mx-0" style="height: 100%">
                                        <div class="col-md-5" >
                                            <div class="p-2">
                                                <img  class="img-fluid rounded-start" style="height: 115px;object-fit: cover;" src="{{asset($user->user_image)}}" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body px-2 py-3" style="direction:rtl;text-align:right">
                                                <h6 class="card-title">{{$user->name}}</h6>
                                                <p class="card-text mb-0 text-xs fw-bolder">- اسم الحساب: {{$user->username}}</p>
                                                <p class="card-text mb-0 text-xs fw-bolder">- العمل: {{$user->user_speciality}}</p>
                                                @if ($user->bio)
                                                    <p class="card-text mb-0 text-xs fw-bolder">- {{$user->bio}}</p>
                                                @endif
                                                <p class="card-text mb-0 text-xs fw-bolder"><small class="text-muted">- تاريخ الإنضمام: {{$user->created_at->format('D d-m-Y')}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card py-1">
                                    <div class="row  justify-content-center">
                                        <div class="col-12">
                                            <div class="mx-2 text-center">
                                                <a class="my-2 bg-light px-5 px-sm-4 py-1 rounded-end btn-light " style="box-shadow:0 0.3rem 0.5rem rgb(92 163 179 / 45%)" type="button"  data-bs-toggle="modal" data-bs-target="#edit-user{{$user->user_slug}}">
                                                    <i class="fa-regular text-info fa-pen-to-square fa-lg"></i>
                                                </a>
                                                <a class="my-2 bg-light px-5 px-sm-4 py-1 rounded-start btn-light " style="box-shadow:0 0.3rem 0.5rem rgb(92 163 179 / 45%)" type="button"  data-bs-toggle="modal" data-bs-target="#delete-user{{$user->user_slug}}">
                                                    <i class="fa-solid text-danger fa-trash  fa-lg"></i>
                                                </a>
                                                <!--delete Modal -->
                                                <div class="modal fade" id="delete-user{{$user->user_slug}}" style="direction: ltr" tabindex="-1" aria-labelledby="delete-user{{$user->user_slug}}Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">


                                                            @if (auth()->user()->user_slug == $user->user_slug)
                                                                <div class="modal-body row ">
                                                                    <div class="col-4 text-center pb-3 pt-5 ">
                                                                        <i class="fa-regular fa-face-smile fa-rotate-by fa-2xl" style="font-size:100px"></i>
                                                                    </div>
                                                                    <div class="col-8 pb-4 pt-5 ">
                                                                        <p class="fw-bolder" style="text-align:center;direction:rtl">لا يمكنك حذف الحساب.. راجع المسؤول</p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="modal-body row ">
                                                                    <div class="col-4 text-center pb-3 pt-5 ">
                                                                        <i class="fa-regular fa-face-frown fa-rotate-by fa-2xl" style="--fa-rotate-angle: 335deg;font-size:100px"></i>
                                                                    </div>
                                                                    <div class="col-8 pb-4 pt-5 ">
                                                                        <p class="fw-bolder" style="text-align:center;direction:rtl">هل أنت متأكد من حذف الحساب ؟؟</p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer py-1  text-muted">
                                                                    <a href="{{route('deleteUser',$user->user_slug)}}" type="button" class="btn btn-danger">تأكيد</a>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--edit Modal -->
                                                <div class="modal fade" id="edit-user{{$user->user_slug}}" style="direction: ltr" tabindex="-1" aria-labelledby="edit-user{{$user->user_slug}}Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-body" style="direction: rtl">
                                                                <div class="text-center">
                                                                    <h4 class="mt-0 w-100" style="max-width: unset">تعديل الحساب</h4>
                                                                    <hr class="divider w-100 mx-0 mt-0 mb-1" />
                                                                </div>
                                                                <form method="POST" action="{{route('updateUser',$user->user_slug)}}">
                                                                    @csrf
                                                                    <div class="form-row">
                                                                        <div class="form-floating col-6 mb-3">
                                                                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" required  value="{{$user->name}}"/>
                                                                                @error('name')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            <label>اسم المستخدم:</label>
                                                                        </div>

                                                                        <div class="form-floating col-6 mb-3">
                                                                            <input class="form-control @error('username') is-invalid @enderror" name="username" type="text" required value="{{$user->username}}"  />
                                                                                @error('username')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            <label>اسم الحساب:</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-floating col-6 mb-3">
                                                                            <select class="form-control @error('grade') is-invalid @enderror" name="grade" required>
                                                                                <option
                                                                                    @if ($user->grade =='user')
                                                                                        selected
                                                                                    @endif
                                                                                value="user">مستخدم</option>
                                                                                <option
                                                                                    @if ($user->grade =='editor')
                                                                                        selected
                                                                                    @endif
                                                                                value="editor">مشرف</option>
                                                                                <option
                                                                                    @if ($user->grade =='admin')
                                                                                        selected
                                                                                    @endif
                                                                                value="admin">مدير</option>
                                                                            </select>
                                                                                @error('grade')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            <label >مستوى الحساب:</label>
                                                                        </div>
                                                                        <div class="form-floating col-6 mb-3">
                                                                            <select class="form-control " name="user_speciality" required >
                                                                                <option
                                                                                    @if ($user->user_speciality == "طبيب جراح")
                                                                                        selected
                                                                                    @endif
                                                                                value="طبيب جراح">طبيب جراح</option>
                                                                                <option
                                                                                    @if ($user->user_speciality == "طبيب تخدير")
                                                                                        selected
                                                                                    @endif
                                                                                value="طبيب تخدير">طبيب تخدير</option>
                                                                                <option
                                                                                    @if ($user->user_speciality == "مساعد جراح")
                                                                                        selected
                                                                                    @endif
                                                                                value="مساعد جراح">مساعد جراح</option>
                                                                                <option
                                                                                    @if ($user->user_speciality == "فني تخدير")
                                                                                        selected
                                                                                    @endif
                                                                                value="فني تخدير">فني تخدير</option>
                                                                                <option
                                                                                    @if ($user->user_speciality == "إداري")
                                                                                        selected
                                                                                    @endif
                                                                                value="إداري">إداري</option>
                                                                            </select>
                                                                            <label>الإختصاص:</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-floating col-6 mb-3">
                                                                            <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"  autocomplete="new-password" />
                                                                                @error('password')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            <label >كلمة المرور:</label>
                                                                        </div>
                                                                        <div class="form-floating col-6 mb-3">
                                                                            <input class="form-control " type="password" name="password_confirmation" autocomplete="new-password"  />

                                                                            <label>تأكيد كلمة المرور:</label>
                                                                        </div>
                                                                        <div class="form-floating col-12 mb-3">
                                                                            <input class="form-control @error('bio') is-invalid @enderror" name="bio" type="text"   value="{{$user->bio}}"/>
                                                                                @error('bio')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            <label>حول المستخدم:</label>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse


                    </div>

                </div>
                <hr class="divider w-100 m-0" style="max-width: unset" />
            </div>

        </div>
    </div>

</section>


@endsection
