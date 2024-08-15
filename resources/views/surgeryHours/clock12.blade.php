<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">12 PM</p></td>
    @if ($feildLimit[12][0] > 0)
        <td @if ($feildLimit[12][0] > 1) rowspan="{{$feildLimit[12][0]}}" @endif>
            @if ($feildLocations[12][0])
                {!!$myClass->fields($feildLocations[12][0])!!}
            @else
                {!!$myClass->addfield('12',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[12][1] > 0)
        <td @if ($feildLimit[12][1] > 1) rowspan="{{$feildLimit[12][1]}}" @endif>
            @if ($feildLocations[12][1])
                {!!$myClass->fields($feildLocations[12][1])!!}
            @else
                {!!$myClass->addfield('12',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[12][2] > 0)
        <td @if ($feildLimit[12][2] > 1) rowspan="{{$feildLimit[12][2]}}" @endif>
            @if ($feildLocations[12][2])
                {!!$myClass->fields($feildLocations[12][2])!!}
            @else
                {!!$myClass->addfield('12',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[12][3] > 0)
        <td @if ($feildLimit[12][3] > 1) rowspan="{{$feildLimit[12][3]}}" @endif>
            @if ($feildLocations[12][3])
                {!!$myClass->fields($feildLocations[12][3])!!}
            @else
                {!!$myClass->addfield('12',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[12][4] > 0)
        <td @if ($feildLimit[12][4] > 1) rowspan="{{$feildLimit[12][4]}}" @endif>
            @if ($feildLocations[12][4])
                {!!$myClass->fields($feildLocations[12][4])!!}
            @else
                {!!$myClass->addfield('12',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
