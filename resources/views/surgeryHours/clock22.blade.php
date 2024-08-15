<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">10 PM</p></td>
    @if ($feildLimit[22][0] > 0)
        <td @if ($feildLimit[22][0] > 1) rowspan="{{$feildLimit[22][0]}}" @endif>
            @if ($feildLocations[22][0])
                {!!$myClass->fields($feildLocations[22][0])!!}
            @else
                {!!$myClass->addfield('22',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[22][1] > 0)
        <td @if ($feildLimit[22][1] > 1) rowspan="{{$feildLimit[22][1]}}" @endif>
            @if ($feildLocations[22][1])
                {!!$myClass->fields($feildLocations[22][1])!!}
            @else
                {!!$myClass->addfield('22',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[22][2] > 0)
        <td @if ($feildLimit[22][2] > 1) rowspan="{{$feildLimit[22][2]}}" @endif>
            @if ($feildLocations[22][2])
                {!!$myClass->fields($feildLocations[22][2])!!}
            @else
                {!!$myClass->addfield('22',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[22][3] > 0)
        <td @if ($feildLimit[22][3] > 1) rowspan="{{$feildLimit[22][3]}}" @endif>
            @if ($feildLocations[22][3])
                {!!$myClass->fields($feildLocations[22][3])!!}
            @else
                {!!$myClass->addfield('22',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[22][4] > 0)
        <td @if ($feildLimit[22][4] > 1) rowspan="{{$feildLimit[22][4]}}" @endif>
            @if ($feildLocations[22][4])
                {!!$myClass->fields($feildLocations[22][4])!!}
            @else
                {!!$myClass->addfield('22',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
