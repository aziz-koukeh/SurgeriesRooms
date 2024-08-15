<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">4 AM</p></td>
    @if ($feildLimit[4][0] != 0)
        <td @if ($feildLimit[4][0] > 1) rowspan="{{$feildLimit[4][0]}}" @endif>
            @if ($feildLocations[4][0])
                {!!$myClass->fields($feildLocations[4][0])!!}
            @else
                {!!$myClass->addfield('04',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[4][1] != 0)
        <td @if ($feildLimit[4][1] > 1) rowspan="{{$feildLimit[4][1]}}" @endif>
            @if ($feildLocations[4][1])
                {!!$myClass->fields($feildLocations[4][1])!!}
            @else
                {!!$myClass->addfield('04',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[4][2] != 0)
        <td @if ($feildLimit[4][2] > 1) rowspan="{{$feildLimit[4][2]}}" @endif>
            @if ($feildLocations[4][2])
                {!!$myClass->fields($feildLocations[4][2])!!}
            @else
                {!!$myClass->addfield('04',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[4][3] != 0)
        <td @if ($feildLimit[4][3] > 1) rowspan="{{$feildLimit[4][3]}}" @endif>
            @if ($feildLocations[4][3])
                {!!$myClass->fields($feildLocations[4][3])!!}
            @else
                {!!$myClass->addfield('04',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[4][4] != 0)
        <td @if ($feildLimit[4][4] > 1) rowspan="{{$feildLimit[4][4]}}" @endif>
            @if ($feildLocations[4][4])
                {!!$myClass->fields($feildLocations[4][4])!!}
            @else
                {!!$myClass->addfield('04',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
