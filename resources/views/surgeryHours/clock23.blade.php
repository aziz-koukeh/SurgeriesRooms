<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">11 PM</p></td>
    @if ($feildLimit[23][0] > 0)
        <td @if ($feildLimit[23][0] > 1) rowspan="{{$feildLimit[23][0]}}" @endif>
            @if ($feildLocations[23][0])
                {!!$myClass->fields($feildLocations[23][0])!!}
            @else
                {!!$myClass->addfield('23',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[23][1] > 0)
        <td @if ($feildLimit[23][1] > 1) rowspan="{{$feildLimit[23][1]}}" @endif>
            @if ($feildLocations[23][1])
                {!!$myClass->fields($feildLocations[23][1])!!}
            @else
                {!!$myClass->addfield('23',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[23][2] > 0)
        <td @if ($feildLimit[23][2] > 1) rowspan="{{$feildLimit[23][2]}}" @endif>
            @if ($feildLocations[23][2])
                {!!$myClass->fields($feildLocations[23][2])!!}
            @else
                {!!$myClass->addfield('23',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[23][3] > 0)
        <td @if ($feildLimit[23][3] > 1) rowspan="{{$feildLimit[23][3]}}" @endif>
            @if ($feildLocations[23][3])
                {!!$myClass->fields($feildLocations[23][3])!!}
            @else
                {!!$myClass->addfield('23',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[23][4] > 0)
        <td @if ($feildLimit[23][4] > 1) rowspan="{{$feildLimit[23][4]}}" @endif>
            @if ($feildLocations[23][4])
                {!!$myClass->fields($feildLocations[23][4])!!}
            @else
                {!!$myClass->addfield('23',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
