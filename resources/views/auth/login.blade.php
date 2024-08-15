@extends('layouts.app')

@section('content')

    <header class="masthead" style="min-height: 100vh;vertical-align: middle; padding-top: 10rem">
        <div class="container  px-4 px-lg-5 h-100">
            <div class="row justify-content-center" style="/*padding-top: 10%;*/">
                <div class="col-md-8 col-lg-6">
                    <div class="card border-success mt-5 mb-3" style="background:unset;vertical-align: middle;">
                        <div class="card-header text-center text-light ">تسجيل الدخول</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- <div class="row mb-3" style="direction:rtl">
                                    <label for="userName" class="col-md-4 col-form-label  text-light text-md-start">اسم الحساب</label>

                                    <div class="col-md-6">
                                        <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus>

                                        @error('userName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" style="direction:rtl">
                                    <label for="password" class="col-md-4 col-form-label  text-light text-md-start">كلمة المرور</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="row justify-content-center" style="direction: rtl">

                                    <div class="form-floating col-md-8 mb-3">
                                        <input class="form-control text-center @error('username') is-invalid @enderror" id="username" name="username" type="text"  value="{{ old('userName') }}" required autocomplete="userName" autofocus />
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <label for="username">اسم الحساب:</label>
                                    </div>
                                    <div class="form-floating col-md-8 mb-3">
                                        <input class="form-control text-center @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password"  />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <label for="password">كلمة المرور:</label>
                                    </div>
                                    {{-- <div class="form-floating justify-content-center col-md-8 mb-3">
                                        <div class="justify-content-center bg-light px-lg-5" style="border-radius: 8px" >
                                            {!! NoCaptcha::display(['data-theme' => 'light' ,'data-size'=>'compact normal']) !!}
                                        </div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong class="text-light text-xs">{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div> --}}
                                    <div class="col-md-8 text-center">
                                        <button type="submit" class="btn btn-outline-success rounded-pill">
                                            تسجيل الدخول
                                        </button>
                                    </div>

                                </div>

                                {{-- <div class="row mb-0 justify-content-center">

                                </div> --}}
                            </form>
                        </div>
                    </div>
                    {{-- <div class="card border-info mb-3" style="max-width: 20rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                        <h4 class="card-title">Info card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </header>
@endsection
