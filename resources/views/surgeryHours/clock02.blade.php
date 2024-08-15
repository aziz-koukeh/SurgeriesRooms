<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">2 AM</p></td>
    @if ($feildLimit[2][0] != 0)
        <td @if ($feildLimit[2][0] > 1) rowspan="{{$feildLimit[2][0]}}" @endif>
            @if ($feildLocations[2][0])
                {!!$myClass->fields($feildLocations[2][0])!!}
            @else
                {!!$myClass->addfield('02',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[2][1] != 0)
        <td @if ($feildLimit[2][1] > 1) rowspan="{{$feildLimit[2][1]}}" @endif>
            @if ($feildLocations[2][1])
                {!!$myClass->fields($feildLocations[2][1])!!}
            @else
                {!!$myClass->addfield('02',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[2][2] != 0)
        <td @if ($feildLimit[2][2] > 1) rowspan="{{$feildLimit[2][2]}}" @endif>
            @if ($feildLocations[2][2])
                {!!$myClass->fields($feildLocations[2][2])!!}
            @else
                {!!$myClass->addfield('02',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[2][3] != 0)
        <td @if ($feildLimit[2][3] > 1) rowspan="{{$feildLimit[2][3]}}" @endif>
            @if ($feildLocations[2][3])
                {!!$myClass->fields($feildLocations[2][3])!!}
            @else
                {!!$myClass->addfield('02',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[2][4] != 0)
        <td @if ($feildLimit[2][4] > 1) rowspan="{{$feildLimit[2][4]}}" @endif>
            @if ($feildLocations[2][4])
                {!!$myClass->fields($feildLocations[2][4])!!}
            @else
                {!!$myClass->addfield('02',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
