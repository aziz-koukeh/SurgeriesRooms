
<div style="position: fixed; bottom: 60px; left: 20px;direction:ltr;z-index: 2;text-align:right;width: 300px;">

    {{-- رسالة تنويه عن التكرار --}}
    @if (session('AlertMessage'))
        <div class="toast shadow" role="alert" id="AlertMessage" aria-live="assertive" aria-atomic="true" data-animation="true">
            <div class="toast-header text-{{session('alert_type_A')}}">
                <img src="{{asset('assets/img/logo.ico')}}" alt="logo" height="25px">
                <strong class="mx-auto text-gray-900" style="direction:rtl">{{session('MainAlertMessage')}}</strong>
                <small class="text-muted">الآن</small>
            </div>
            <div class="toast-body text-gray-800" style="direction: rtl;text-align: right">
                <b>{!!session('AlertMessage')!!}</b>
            </div>
        </div>
    @endif
    {{-- رسالة تنويه عن التكرار --}}


</div>
