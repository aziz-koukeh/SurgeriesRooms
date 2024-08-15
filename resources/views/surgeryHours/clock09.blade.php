<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">9 AM</p></td>
    @if ($feildLimit[9][0] > 0)
        <td @if ($feildLimit[9][0] > 1) rowspan="{{$feildLimit[9][0]}}" @endif>
            @if ($feildLocations[9][0])
                {!!$myClass->fields($feildLocations[9][0])!!}
            @else
                {!!$myClass->addfield('09',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[9][1] > 0)
        <td @if ($feildLimit[9][1] > 1) rowspan="{{$feildLimit[9][1]}}" @endif>
            @if ($feildLocations[9][1])
                {!!$myClass->fields($feildLocations[9][1])!!}
            @else
                {!!$myClass->addfield('09',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[9][2] > 0)
        <td @if ($feildLimit[9][2] > 1) rowspan="{{$feildLimit[9][2]}}" @endif>
            @if ($feildLocations[9][2])
                {!!$myClass->fields($feildLocations[9][2])!!}
            @else
                {!!$myClass->addfield('09',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[9][3] > 0)
        <td @if ($feildLimit[9][3] > 1) rowspan="{{$feildLimit[9][3]}}" @endif>
            @if ($feildLocations[9][3])
                {!!$myClass->fields($feildLocations[9][3])!!}
            @else
                {!!$myClass->addfield('09',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[9][4] > 0)
        <td @if ($feildLimit[9][4] > 1) rowspan="{{$feildLimit[9][4]}}" @endif>
            @if ($feildLocations[9][4])
                {!!$myClass->fields($feildLocations[9][4])!!}
            @else
                {!!$myClass->addfield('09',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
