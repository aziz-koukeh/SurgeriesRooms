<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">8 AM</p></td>
    @if ($feildLimit[8][0] != 0)
        <td @if ($feildLimit[8][0] > 1) rowspan="{{$feildLimit[8][0]}}" @endif>
            @if ($feildLocations[8][0])
                {!!$myClass->fields($feildLocations[8][0])!!}
            @else
                {!!$myClass->addfield('08',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[8][1] != 0)
        <td @if ($feildLimit[8][1] > 1) rowspan="{{$feildLimit[8][1]}}" @endif>
            @if ($feildLocations[8][1])
                {!!$myClass->fields($feildLocations[8][1])!!}
            @else
                {!!$myClass->addfield('08',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[8][2] != 0)
        <td @if ($feildLimit[8][2] > 1) rowspan="{{$feildLimit[8][2]}}" @endif>
            @if ($feildLocations[8][2])
                {!!$myClass->fields($feildLocations[8][2])!!}
            @else
                {!!$myClass->addfield('08',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[8][3] != 0)
        <td @if ($feildLimit[8][3] > 1) rowspan="{{$feildLimit[8][3]}}" @endif>
            @if ($feildLocations[8][3])
                {!!$myClass->fields($feildLocations[8][3])!!}
            @else
                {!!$myClass->addfield('08',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[8][4] != 0)
        <td @if ($feildLimit[8][4] > 1) rowspan="{{$feildLimit[8][4]}}" @endif>
            @if ($feildLocations[8][4])
                {!!$myClass->fields($feildLocations[8][4])!!}
            @else
                {!!$myClass->addfield('08',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
