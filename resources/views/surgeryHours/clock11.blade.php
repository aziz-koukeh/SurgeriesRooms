<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">11 AM</p></td>
    @if ($feildLimit[11][0] > 0)
        <td @if ($feildLimit[11][0] > 1) rowspan="{{$feildLimit[11][0]}}" @endif>
            @if ($feildLocations[11][0])
                {!!$myClass->fields($feildLocations[11][0])!!}
            @else
                {!!$myClass->addfield('11',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[11][1] > 0)
        <td @if ($feildLimit[11][1] > 1) rowspan="{{$feildLimit[11][1]}}" @endif>
            @if ($feildLocations[11][1])
                {!!$myClass->fields($feildLocations[11][1])!!}
            @else
                {!!$myClass->addfield('11',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[11][2] > 0)
        <td @if ($feildLimit[11][2] > 1) rowspan="{{$feildLimit[11][2]}}" @endif>
            @if ($feildLocations[11][2])
                {!!$myClass->fields($feildLocations[11][2])!!}
            @else
                {!!$myClass->addfield('11',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[11][3] > 0)
        <td @if ($feildLimit[11][3] > 1) rowspan="{{$feildLimit[11][3]}}" @endif>
            @if ($feildLocations[11][3])
                {!!$myClass->fields($feildLocations[11][3])!!}
            @else
                {!!$myClass->addfield('11',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[11][4] > 0)
        <td @if ($feildLimit[11][4] > 1) rowspan="{{$feildLimit[11][4]}}" @endif>
            @if ($feildLocations[11][4])
                {!!$myClass->fields($feildLocations[11][4])!!}
            @else
                {!!$myClass->addfield('11',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
