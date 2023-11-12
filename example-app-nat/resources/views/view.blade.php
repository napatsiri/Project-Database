<li> {{ $user->name }} </li>
@foreach ( $roles as $role)
    <li> role : {{$role['id'] }}: nameD : {{$role['name'] }}</li>
@endforeach
