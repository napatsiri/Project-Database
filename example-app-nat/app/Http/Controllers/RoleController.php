<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class RoleController extends Controller
{
    public function addUsers(){
        // $user= new User(); 
        // $user->name= "Geralt"; 
        // $user->email= "geralt@gmail.com"; 
        // $user->password= encrypt('secret'); 
        // $user->save(); 
        // $roleids= [1,2]; 
        // $user->roles()->attach($roleids); 
        // $user= new User(); 
        // $user->name= "Yennefer"; 
        // $user->email= "yennefer@gmail.com"; 
        // $user->password= encrypt('secret'); 
        // $user->save(); 
        // $roleids= [2,3,4]; 
        // $user->roles()->attach($roleids); 
        $user= new User(); 
        $user->name= "Triss"; 
        $user->email= "triss@gmail.com"; 
        $user->password= encrypt('secret'); 
        $user->save(); $roleids= [3,4,5]; 
        $user->roles()->attach($roleids); 
        return "Record has been created sucessfully!"; }

        public function getAllRolesByUser($id) 
        { 
            $user=User::find($id); 
            $roles= $user->roles; 
            // return $roles; 
            
            return view('view', compact('roles', 'user'));
        }

        public function getAllUsersByRole($id) 
        { 
            $role= Role::find($id); 
            $users= $role->users; 
            //return$users; 
            return view('view2', compact('users', 'role'));
        }
}
