<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">9 PM</p></td>
    @if ($feildLimit[21][0] > 0)
        <td @if ($feildLimit[21][0] > 1) rowspan="{{$feildLimit[21][0]}}" @endif>
            @if ($feildLocations[21][0])
                {!!$myClass->fields($feildLocations[21][0])!!}
            @else
                {!!$myClass->addfield('21',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[21][1] > 0)
        <td @if ($feildLimit[21][1] > 1) rowspan="{{$feildLimit[21][1]}}" @endif>
            @if ($feildLocations[21][1])
                {!!$myClass->fields($feildLocations[21][1])!!}
            @else
                {!!$myClass->addfield('21',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[21][2] > 0)
        <td @if ($feildLimit[21][2] > 1) rowspan="{{$feildLimit[21][2]}}" @endif>
            @if ($feildLocations[21][2])
                {!!$myClass->fields($feildLocations[21][2])!!}
            @else
                {!!$myClass->addfield('21',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[21][3] > 0)
        <td @if ($feildLimit[21][3] > 1) rowspan="{{$feildLimit[21][3]}}" @endif>
            @if ($feildLocations[21][3])
                {!!$myClass->fields($feildLocations[21][3])!!}
            @else
                {!!$myClass->addfield('21',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[21][4] > 0)
        <td @if ($feildLimit[21][4] > 1) rowspan="{{$feildLimit[21][4]}}" @endif>
            @if ($feildLocations[21][4])
                {!!$myClass->fields($feildLocations[21][4])!!}
            @else
                {!!$myClass->addfield('21',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
