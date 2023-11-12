<li> {{ $role->name }} </li>
@foreach ( $users as $user)
    <li> ID : {{$user['id'] }}: nameU : {{$user['name'] }}</li>
@endforeach
