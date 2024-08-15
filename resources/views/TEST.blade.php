<tbody style="vertical-align: middle;font-weight: bolder;">
    @if ($time_9 ==1)
        <tr>
            <td>الساعة 9</td>
            @forelse ($surgeries as $value)


                @if ($check=Carbon\Carbon::parse($value->surgery_time)->format('h') == 9)
                    <td>
                        @if ($value->surgery_room == 'room_1')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_2')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_3')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_b')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_h')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                @else
                    {{-- <td>asdhgsjhas <hr>  <span class="badge bg-success">المساعد</span> <span class="badge bg-primary">التخدير</span></td> --}}

                @endif
            @empty

            @endforelse
        </tr>
    @endif
    @if ($time_10 ==1)
        <tr>
            <td>الساعة 10</td>
            @forelse ($surgeries as $value)


            @if ($check=Carbon\Carbon::parse($value->surgery_time)->format('h') == 10)
                <td>
                    @if ($value->surgery_room == 'room_1')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_2')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_3')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_b')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_h')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
            @else
                {{-- <td>asdhgsjhas <hr>  <span class="badge bg-success">المساعد</span> <span class="badge bg-primary">التخدير</span></td> --}}

            @endif
        @empty

        @endforelse
        </tr>
    @endif
    @if ($time_11 ==1)
        <tr>
            <td>الساعة 11</td>
            @forelse ($surgeries as $value)


                @if ($check=Carbon\Carbon::parse($value->surgery_time)->format('h') == 11)
                    <td>
                        @if ($value->surgery_room == 'room_1')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_2')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_3')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_b')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_h')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                @else
                    {{-- <td>asdhgsjhas <hr>  <span class="badge bg-success">المساعد</span> <span class="badge bg-primary">التخدير</span></td> --}}

                @endif
            @empty

            @endforelse
        </tr>
    @endif
    @if ($time_12 ==1)
        <tr>
            <td>الساعة 12</td>
            @forelse ($surgeries as $value)


                @if ($check=Carbon\Carbon::parse($value->surgery_time)->format('h') == 12)
                    <td>
                        @if ($value->surgery_room == 'room_1')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_2')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_3')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_b')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                    <td>
                        @if ($value->surgery_room == 'room_h')
                            <span class="text-xs" >{{$value->surgery_name}}</span>
                            <hr class="m-0 p-0">
                            <span class="text-xs" >{{$value->doctor_name}}</span>
                            <hr class="m-0 p-0">
                            <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                        @else
                            حقل إضافة
                        @endif
                    </td>
                @else
                    {{-- <td>asdhgsjhas <hr>  <span class="badge bg-success">المساعد</span> <span class="badge bg-primary">التخدير</span></td> --}}

                @endif
            @empty

            @endforelse
        </tr>
    @endif
    @if ($time_1 ==1)
        <tr>
            <td>الساعة 1</td>
            @forelse ($surgeries as $value)


            @if ($check=Carbon\Carbon::parse($value->surgery_time)->format('h') == 1)
                <td>
                    @if ($value->surgery_room == 'room_1')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_2')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_3')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_b')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_h')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
            @else
                {{-- <td>asdhgsjhas <hr>  <span class="badge bg-success">المساعد</span> <span class="badge bg-primary">التخدير</span></td> --}}

            @endif
        @empty

        @endforelse
        </tr>
    @endif
    @if ($time_2 ==1)
        <tr>
            <td>الساعة 2</td>
            @forelse ($surgeries as $value)


            @if ($check=Carbon\Carbon::parse($value->surgery_time)->format('h') == 2)
                <td>
                    @if ($value->surgery_room == 'room_1')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_2')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_3')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_b')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_h')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
            @else
                {{-- <td>asdhgsjhas <hr>  <span class="badge bg-success">المساعد</span> <span class="badge bg-primary">التخدير</span></td> --}}

            @endif
        @empty

        @endforelse
        </tr>
    @endif
    @if ($time_3 ==1)
        <tr>
            <td>الساعة 3</td>
            @forelse ($surgeries as $value)


            @if ($check=Carbon\Carbon::parse($value->surgery_time)->format('h') == 3)
                <td>
                    @if ($value->surgery_room == 'room_1')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_2')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_3')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_b')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
                <td>
                    @if ($value->surgery_room == 'room_h')
                        <span class="text-xs" >{{$value->surgery_name}}</span>
                        <hr class="m-0 p-0">
                        <span class="text-xs" >{{$value->doctor_name}}</span>
                        <hr class="m-0 p-0">
                        <p class="text-xs" style="text-align: center;direction: ltr" >{{Carbon\Carbon::parse($value->surgery_time)->format('h:i a');}}</p>
                    @else
                        حقل إضافة
                    @endif
                </td>
            @else
                {{-- <td>asdhgsjhas <hr>  <span class="badge bg-success">المساعد</span> <span class="badge bg-primary">التخدير</span></td> --}}

            @endif
        @empty

        @endforelse
        </tr>
    @endif

</tbody>





{{-- $surgeryCheckRangeIn = Surgery::where('surgery_room', $request->surgery_room)
// ->whereTime('surgery_time','=', $surgeryTime->format('H'))  // يعمل في حال كان الوقت بعد المحدد في نفس الساعة



->whereTime('surgery_time', '<=', $surgeryTime->format('H:00:00'))
->whereTime('surgery_term', '>=', $surgeryTime->format('H:59:59') )
// ->where('surgery_term', '<', $surgeryTime->format('H:00:00'))
// ->where('surgery_term', '>=', $endTime )
// ->orWhere(function ($query)
//             {
//             $query->whereTime('surgery_term', '>=', $surgeryTime->format('H:59:59'))->whereTime('surgery_term', '<', $endTime );
//             })

->whereDay('surgery_time', $surgeryTime->format('d'))
->first();
$surgeryCheckRangeOut = Surgery::where('surgery_room', $request->surgery_room)
// ->whereTime('surgery_time','=', $surgeryTime->format('H'))  // يعمل في حال كان الوقت بعد المحدد في نفس الساعة



->whereTime('surgery_time', '<=', $surgeryTime->format('H:00:00'))
->whereTime('surgery_term', '>=', $surgeryTime->format('H:59:59') )
// ->where('surgery_term', '<', $surgeryTime->format('H:00:00'))
// ->where('surgery_term', '>=', $endTime )
// ->orWhere(function ($query)
//             {
//             $query->whereTime('surgery_term', '>=', $surgeryTime->format('H:59:59'))->whereTime('surgery_term', '<', $endTime );
//             })

->whereDay('surgery_time', $surgeryTime->format('d'))
->first();




// dd($surgeryCheckRange , 'Range');

$surgeryCheckSameTime = Surgery::where('surgery_room', $request->surgery_room)
->whereTime('surgery_time', '>=', $surgeryTime->format('H:00:00'))
->whereTime('surgery_time', '<', $surgeryTime->format('H:59:59'))
->whereDay('surgery_time', $surgeryTime->format('d'))
->first();

// dd($surgeryCheckSameTime , 'SameTime');

$surgeryCheckSameTerm = Surgery::where('surgery_room', $request->surgery_room)
->whereTime('surgery_time', '<=', $endTime)
->whereTime('surgery_term', '>=', $endTime)
->whereDay('surgery_time', $surgeryTime->format('d'))
->first();

dd($surgeryCheckRangeIn , 'Range In' ,$surgeryCheckRangeOut , 'Range Out' ,$surgeryCheckSameTime , 'SameTime', $surgeryCheckSameTerm , 'SameTerm'); --}}

@php

    $arrayShow
    for ($i = 0; $i < 5; $i++) {
        $newVariable = "Value " . $i;
        echo $newVariable . "<br>";
    }
@endphp





    @if ($feildLocation[x_x][o_o] != 0)
        <td @if ($feildLocation[x_x][o_o] > 1) rowspan="{{$feildLocation[x_x][o_o]}}" @endif>
            @if ($feildx_x_o_o)
                {!!$myClass->fields($feildx_x_o_o)!!}
            @else
                {!!$myClass->addfield('x_x',o_o, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLocation[x_x][o_o] != 0)
        <td @if ($feildLocation[x_x][o_o] > 1) rowspan="{{$feildLocation[x_x][o_o]}}" @endif>
            @if ($feildx_x_o_o)
                {!!$myClass->fields($feildx_x_o_o)!!}
            @else
                {!!$myClass->addfield('x_x',o_o, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLocation[x_x][o_o] != 0)
        <td @if ($feildLocation[x_x][o_o] > 1) rowspan="{{$feildLocation[x_x][o_o]}}" @endif>
            @if ($feildx_x_o_o)
                {!!$myClass->fields($feildx_x_o_o)!!}
            @else
                {!!$myClass->addfield('x_x',o_o, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLocation[x_x][o_o] != 0)
        <td @if ($feildLocation[x_x][o_o] > 1) rowspan="{{$feildLocation[x_x][o_o]}}" @endif>
            @if ($feildx_x_o_o)
                {!!$myClass->fields($feildx_x_o_o)!!}
            @else
                {!!$myClass->addfield('x_x',o_o, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLocation[x_x][o_o] != 0)
        <td @if ($feildLocation[x_x][o_o] > 1) rowspan="{{$feildLocation[x_x][o_o]}}" @endif>
            @if ($feildx_x_o_o)
                {!!$myClass->fields($feildx_x_o_o)!!}
            @else
                {!!$myClass->addfield('x_x',o_o, $date)!!}
            @endif
        </td>
    @endif
</tr>


<span class="badge bg-warning">
    <i class="fa-solid fa-magnet fa-rotate-90"></i>
    <i class="fa-solid fa-x-ray"></i>
</span>


<span class="badge bg-warning">
    <i class="fa-solid fa-desktop"></i>
    <i class="fa-solid fa-video"></i>
</span>


<span class="badge bg-warning">
    <i class="fa-solid fa-weight-scale"></i>
    <i class="fa-solid fa-stethoscope"></i>
</span>
