<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">3 AM</p></td>
    @if ($feildLimit[3][0] != 0)
        <td @if ($feildLimit[3][0] > 1) rowspan="{{$feildLimit[3][0]}}" @endif>
            @if ($feildLocations[3][0])
                {!!$myClass->fields($feildLocations[3][0])!!}
            @else
                {!!$myClass->addfield('03',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[3][1] != 0)
        <td @if ($feildLimit[3][1] > 1) rowspan="{{$feildLimit[3][1]}}" @endif>
            @if ($feildLocations[3][1])
                {!!$myClass->fields($feildLocations[3][1])!!}
            @else
                {!!$myClass->addfield('03',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[3][2] != 0)
        <td @if ($feildLimit[3][2] > 1) rowspan="{{$feildLimit[3][2]}}" @endif>
            @if ($feildLocations[3][2])
                {!!$myClass->fields($feildLocations[3][2])!!}
            @else
                {!!$myClass->addfield('03',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[3][3] != 0)
        <td @if ($feildLimit[3][3] > 1) rowspan="{{$feildLimit[3][3]}}" @endif>
            @if ($feildLocations[3][3])
                {!!$myClass->fields($feildLocations[3][3])!!}
            @else
                {!!$myClass->addfield('03',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[3][4] != 0)
        <td @if ($feildLimit[3][4] > 1) rowspan="{{$feildLimit[3][4]}}" @endif>
            @if ($feildLocations[3][4])
                {!!$myClass->fields($feildLocations[3][4])!!}
            @else
                {!!$myClass->addfield('03',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
