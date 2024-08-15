<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">1 PM</p></td>
    @if ($feildLimit[13][0] > 0)
        <td @if ($feildLimit[13][0] > 1) rowspan="{{$feildLimit[13][0]}}" @endif>
            @if ($feildLocations[13][0])
                {!!$myClass->fields($feildLocations[13][0])!!}
            @else
                {!!$myClass->addfield('13',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[13][1] > 0)
        <td @if ($feildLimit[13][1] > 1) rowspan="{{$feildLimit[13][1]}}" @endif>
            @if ($feildLocations[13][1])
                {!!$myClass->fields($feildLocations[13][1])!!}
            @else
                {!!$myClass->addfield('13',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[13][2] > 0)
        <td @if ($feildLimit[13][2] > 1) rowspan="{{$feildLimit[13][2]}}" @endif>
            @if ($feildLocations[13][2])
                {!!$myClass->fields($feildLocations[13][2])!!}
            @else
                {!!$myClass->addfield('13',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[13][3] > 0)
        <td @if ($feildLimit[13][3] > 1) rowspan="{{$feildLimit[13][3]}}" @endif>
            @if ($feildLocations[13][3])
                {!!$myClass->fields($feildLocations[13][3])!!}
            @else
                {!!$myClass->addfield('13',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[13][4] > 0)
        <td @if ($feildLimit[13][4] > 1) rowspan="{{$feildLimit[13][4]}}" @endif>
            @if ($feildLocations[13][4])
                {!!$myClass->fields($feildLocations[13][4])!!}
            @else
                {!!$myClass->addfield('13',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
