<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">6 AM</p></td>
    @if ($feildLimit[6][0] != 0)
        <td @if ($feildLimit[6][0] > 1) rowspan="{{$feildLimit[6][0]}}" @endif>
            @if ($feildLocations[6][0])
                {!!$myClass->fields($feildLocations[6][0])!!}
            @else
                {!!$myClass->addfield('06',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[6][1] != 0)
        <td @if ($feildLimit[6][1] > 1) rowspan="{{$feildLimit[6][1]}}" @endif>
            @if ($feildLocations[6][1])
                {!!$myClass->fields($feildLocations[6][1])!!}
            @else
                {!!$myClass->addfield('06',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[6][2] != 0)
        <td @if ($feildLimit[6][2] > 1) rowspan="{{$feildLimit[6][2]}}" @endif>
            @if ($feildLocations[6][2])
                {!!$myClass->fields($feildLocations[6][2])!!}
            @else
                {!!$myClass->addfield('06',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[6][3] != 0)
        <td @if ($feildLimit[6][3] > 1) rowspan="{{$feildLimit[6][3]}}" @endif>
            @if ($feildLocations[6][3])
                {!!$myClass->fields($feildLocations[6][3])!!}
            @else
                {!!$myClass->addfield('06',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[6][4] != 0)
        <td @if ($feildLimit[6][4] > 1) rowspan="{{$feildLimit[6][4]}}" @endif>
            @if ($feildLocations[6][4])
                {!!$myClass->fields($feildLocations[6][4])!!}
            @else
                {!!$myClass->addfield('06',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
