<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">7 AM</p></td>
    @if ($feildLimit[7][0] != 0)
        <td @if ($feildLimit[7][0] > 1) rowspan="{{$feildLimit[7][0]}}" @endif>
            @if ($feildLocations[7][0])
                {!!$myClass->fields($feildLocations[7][0])!!}
            @else
                {!!$myClass->addfield('07',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[7][1] != 0)
        <td @if ($feildLimit[7][1] > 1) rowspan="{{$feildLimit[7][1]}}" @endif>
            @if ($feildLocations[7][1])
                {!!$myClass->fields($feildLocations[7][1])!!}
            @else
                {!!$myClass->addfield('07',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[7][2] != 0)
        <td @if ($feildLimit[7][2] > 1) rowspan="{{$feildLimit[7][2]}}" @endif>
            @if ($feildLocations[7][2])
                {!!$myClass->fields($feildLocations[7][2])!!}
            @else
                {!!$myClass->addfield('07',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[7][3] != 0)
        <td @if ($feildLimit[7][3] > 1) rowspan="{{$feildLimit[7][3]}}" @endif>
            @if ($feildLocations[7][3])
                {!!$myClass->fields($feildLocations[7][3])!!}
            @else
                {!!$myClass->addfield('07',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[7][4] != 0)
        <td @if ($feildLimit[7][4] > 1) rowspan="{{$feildLimit[7][4]}}" @endif>
            @if ($feildLocations[7][4])
                {!!$myClass->fields($feildLocations[7][4])!!}
            @else
                {!!$myClass->addfield('07',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
