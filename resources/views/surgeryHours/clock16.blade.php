<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">4 PM</p></td>
    @if ($feildLimit[16][0] > 0)
        <td @if ($feildLimit[16][0] > 1) rowspan="{{$feildLimit[16][0]}}" @endif>
            @if ($feildLocations[16][0])
                {!!$myClass->fields($feildLocations[16][0])!!}
            @else
                {!!$myClass->addfield('16',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[16][1] > 0)
        <td @if ($feildLimit[16][1] > 1) rowspan="{{$feildLimit[16][1]}}" @endif>
            @if ($feildLocations[16][1])
                {!!$myClass->fields($feildLocations[16][1])!!}
            @else
                {!!$myClass->addfield('16',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[16][2] > 0)
        <td @if ($feildLimit[16][2] > 1) rowspan="{{$feildLimit[16][2]}}" @endif>
            @if ($feildLocations[16][2])
                {!!$myClass->fields($feildLocations[16][2])!!}
            @else
                {!!$myClass->addfield('16',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[16][3] > 0)
        <td @if ($feildLimit[16][3] > 1) rowspan="{{$feildLimit[16][3]}}" @endif>
            @if ($feildLocations[16][3])
                {!!$myClass->fields($feildLocations[16][3])!!}
            @else
                {!!$myClass->addfield('16',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[16][4] > 0)
        <td @if ($feildLimit[16][4] > 1) rowspan="{{$feildLimit[16][4]}}" @endif>
            @if ($feildLocations[16][4])
                {!!$myClass->fields($feildLocations[16][4])!!}
            @else
                {!!$myClass->addfield('16',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
