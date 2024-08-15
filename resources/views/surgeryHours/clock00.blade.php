<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">12 AM</p></td>
    @if ($feildLimit[0][0] != 0)
        <td @if ($feildLimit[0][0] > 1) rowspan="{{$feildLimit[0][0]}}" @endif>
            @if ($feildLocations[0][0])
                {!!$myClass->fields($feildLocations[0][0])!!}
            @else
                {!!$myClass->addfield('00',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[0][1] != 0)
        <td @if ($feildLimit[0][1] > 1) rowspan="{{$feildLimit[0][1]}}" @endif>
            @if ($feildLocations[0][1])
                {!!$myClass->fields($feildLocations[0][1])!!}
            @else
                {!!$myClass->addfield('00',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[0][2] != 0)
        <td @if ($feildLimit[0][2] > 1) rowspan="{{$feildLimit[0][2]}}" @endif>
            @if ($feildLocations[0][2])
                {!!$myClass->fields($feildLocations[0][2])!!}
            @else
                {!!$myClass->addfield('00',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[0][3] != 0)
        <td @if ($feildLimit[0][3] > 1) rowspan="{{$feildLimit[0][3]}}" @endif>
            @if ($feildLocations[0][3])
                {!!$myClass->fields($feildLocations[0][3])!!}
            @else
                {!!$myClass->addfield('00',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[0][4] != 0)
        <td @if ($feildLimit[0][4] > 1) rowspan="{{$feildLimit[0][4]}}" @endif>
            @if ($feildLocations[0][4])
                {!!$myClass->fields($feildLocations[0][4])!!}
            @else
                {!!$myClass->addfield('00',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
