<!DOCTYPE html> 
<html> 
    <head> 
        <title>User List</title> 
    </head> <body> 
        <h1>User List</h1> 
        
        @if(count($users) > 0) 
        <ul> @foreach($users as $user) 
            <li>{{ $user->name }} ({{ $user->email }})
            </li> @endforeach </ul> 
            @else <p>No users found.</p> 
            @endif 
        </body> 
        </html>