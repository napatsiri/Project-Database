@foreach ($menus as $muna)
    <ul>{{$muna -> name}}</ul>
    <ul>{{$muna -> description}}</ul>
    <ul>{{$muna -> price}}</ul>
@endforeach
@foreach ($name as $eman)
    <ul>{{$eman -> name}}</ul>
@endforeach