<tr>
    <td><p style="transform: rotate(270deg);padding: 0;margin: 0;direction: ltr;padding: 12px 0">6 PM</p></td>
    @if ($feildLimit[18][0] > 0)
        <td @if ($feildLimit[18][0] > 1) rowspan="{{$feildLimit[18][0]}}" @endif>
            @if ($feildLocations[18][0])
                {!!$myClass->fields($feildLocations[18][0])!!}
            @else
                {!!$myClass->addfield('18',0, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[18][1] > 0)
        <td @if ($feildLimit[18][1] > 1) rowspan="{{$feildLimit[18][1]}}" @endif>
            @if ($feildLocations[18][1])
                {!!$myClass->fields($feildLocations[18][1])!!}
            @else
                {!!$myClass->addfield('18',1, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[18][2] > 0)
        <td @if ($feildLimit[18][2] > 1) rowspan="{{$feildLimit[18][2]}}" @endif>
            @if ($feildLocations[18][2])
                {!!$myClass->fields($feildLocations[18][2])!!}
            @else
                {!!$myClass->addfield('18',2, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[18][3] > 0)
        <td @if ($feildLimit[18][3] > 1) rowspan="{{$feildLimit[18][3]}}" @endif>
            @if ($feildLocations[18][3])
                {!!$myClass->fields($feildLocations[18][3])!!}
            @else
                {!!$myClass->addfield('18',3, $date)!!}
            @endif
        </td>
    @endif
    @if ($feildLimit[18][4] > 0)
        <td @if ($feildLimit[18][4] > 1) rowspan="{{$feildLimit[18][4]}}" @endif>
            @if ($feildLocations[18][4])
                {!!$myClass->fields($feildLocations[18][4])!!}
            @else
                {!!$myClass->addfield('18',4, $date)!!}
            @endif
        </td>
    @endif
</tr>
