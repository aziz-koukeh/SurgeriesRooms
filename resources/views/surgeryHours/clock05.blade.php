<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">5 AM</p></td>
    @if ($feildLimit[5][0] != 0)
        <td @if ($feildLimit[5][0] > 1) rowspan="{{$feildLimit[5][0]}}" @endif>
            @if ($feildLocations[5][0])
                {!!$myClass->fields($feildLocations[5][0])!!}
            @else
                {!!$myClass->addfield('05',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[5][1] != 0)
        <td @if ($feildLimit[5][1] > 1) rowspan="{{$feildLimit[5][1]}}" @endif>
            @if ($feildLocations[5][1])
                {!!$myClass->fields($feildLocations[5][1])!!}
            @else
                {!!$myClass->addfield('05',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[5][2] != 0)
        <td @if ($feildLimit[5][2] > 1) rowspan="{{$feildLimit[5][2]}}" @endif>
            @if ($feildLocations[5][2])
                {!!$myClass->fields($feildLocations[5][2])!!}
            @else
                {!!$myClass->addfield('05',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[5][3] != 0)
        <td @if ($feildLimit[5][3] > 1) rowspan="{{$feildLimit[5][3]}}" @endif>
            @if ($feildLocations[5][3])
                {!!$myClass->fields($feildLocations[5][3])!!}
            @else
                {!!$myClass->addfield('05',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[5][4] != 0)
        <td @if ($feildLimit[5][4] > 1) rowspan="{{$feildLimit[5][4]}}" @endif>
            @if ($feildLocations[5][4])
                {!!$myClass->fields($feildLocations[5][4])!!}
            @else
                {!!$myClass->addfield('05',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
