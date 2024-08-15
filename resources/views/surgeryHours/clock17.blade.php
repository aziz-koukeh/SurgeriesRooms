<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">5 PM</p></td>
    @if ($feildLimit[17][0] > 0)
        <td @if ($feildLimit[17][0] > 1) rowspan="{{$feildLimit[17][0]}}" @endif>
            @if ($feildLocations[17][0])
                {!!$myClass->fields($feildLocations[17][0])!!}
            @else
                {!!$myClass->addfield('17',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[17][1] > 0)
        <td @if ($feildLimit[17][1] > 1) rowspan="{{$feildLimit[17][1]}}" @endif>
            @if ($feildLocations[17][1])
                {!!$myClass->fields($feildLocations[17][1])!!}
            @else
                {!!$myClass->addfield('17',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[17][2] > 0)
        <td @if ($feildLimit[17][2] > 1) rowspan="{{$feildLimit[17][2]}}" @endif>
            @if ($feildLocations[17][2])
                {!!$myClass->fields($feildLocations[17][2])!!}
            @else
                {!!$myClass->addfield('17',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[17][3] > 0)
        <td @if ($feildLimit[17][3] > 1) rowspan="{{$feildLimit[17][3]}}" @endif>
            @if ($feildLocations[17][3])
                {!!$myClass->fields($feildLocations[17][3])!!}
            @else
                {!!$myClass->addfield('17',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[17][4] > 0)
        <td @if ($feildLimit[17][4] > 1) rowspan="{{$feildLimit[17][4]}}" @endif>
            @if ($feildLocations[17][4])
                {!!$myClass->fields($feildLocations[17][4])!!}
            @else
                {!!$myClass->addfield('17',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
