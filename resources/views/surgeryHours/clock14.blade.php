<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">2 PM</p></td>
    @if ($feildLimit[14][0] > 0)
        <td @if ($feildLimit[14][0] > 1) rowspan="{{$feildLimit[14][0]}}" @endif>
            @if ($feildLocations[14][0])
                {!!$myClass->fields($feildLocations[14][0])!!}
            @else
                {!!$myClass->addfield('14',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[14][1] > 0)
        <td @if ($feildLimit[14][1] > 1) rowspan="{{$feildLimit[14][1]}}" @endif>
            @if ($feildLocations[14][1])
                {!!$myClass->fields($feildLocations[14][1])!!}
            @else
                {!!$myClass->addfield('14',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[14][2] > 0)
        <td @if ($feildLimit[14][2] > 1) rowspan="{{$feildLimit[14][2]}}" @endif>
            @if ($feildLocations[14][2])
                {!!$myClass->fields($feildLocations[14][2])!!}
            @else
                {!!$myClass->addfield('14',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[14][3] > 0)
        <td @if ($feildLimit[14][3] > 1) rowspan="{{$feildLimit[14][3]}}" @endif>
            @if ($feildLocations[14][3])
                {!!$myClass->fields($feildLocations[14][3])!!}
            @else
                {!!$myClass->addfield('14',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[14][4] > 0)
        <td @if ($feildLimit[14][4] > 1) rowspan="{{$feildLimit[14][4]}}" @endif>
            @if ($feildLocations[14][4])
                {!!$myClass->fields($feildLocations[14][4])!!}
            @else
                {!!$myClass->addfield('14',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
