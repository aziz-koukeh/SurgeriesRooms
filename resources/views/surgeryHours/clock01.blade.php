<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">1 AM</p></td>
    @if ($feildLimit[1][0] != 0)
        <td @if ($feildLimit[1][0] > 1) rowspan="{{$feildLimit[1][0]}}" @endif>
            @if ($feildLocations[1][0])
                {!!$myClass->fields($feildLocations[1][0])!!}
            @else
                {!!$myClass->addfield('01',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[1][1] != 0)
        <td @if ($feildLimit[1][1] > 1) rowspan="{{$feildLimit[1][1]}}" @endif>
            @if ($feildLocations[1][1])
                {!!$myClass->fields($feildLocations[1][1])!!}
            @else
                {!!$myClass->addfield('01',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[1][2] != 0)
        <td @if ($feildLimit[1][2] > 1) rowspan="{{$feildLimit[1][2]}}" @endif>
            @if ($feildLocations[1][2])
                {!!$myClass->fields($feildLocations[1][2])!!}
            @else
                {!!$myClass->addfield('01',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[1][3] != 0)
        <td @if ($feildLimit[1][3] > 1) rowspan="{{$feildLimit[1][3]}}" @endif>
            @if ($feildLocations[1][3])
                {!!$myClass->fields($feildLocations[1][3])!!}
            @else
                {!!$myClass->addfield('01',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[1][4] != 0)
        <td @if ($feildLimit[1][4] > 1) rowspan="{{$feildLimit[1][4]}}" @endif>
            @if ($feildLocations[1][4])
                {!!$myClass->fields($feildLocations[1][4])!!}
            @else
                {!!$myClass->addfield('01',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
