<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Events\UserCreated;
use App\Events\UserDeleted;

class UserController extends Controller
{
    public function create(){
        $user = User::create([
            'name' => 'Jeni',
            'role_id' => '1',
            'email' => 'jeni@gmail.com',
            'password' => Hash::make('cobajeni'),
        ]);

        UserCreated::dispatch($user);
    }

    public function delete($id){
        $user = User::where('id', $id)->first();
        $user->delete();

        UserDeleted::dispatch($user);
    }

    public function list(){
        $users = User::with('image')->get();
        return view('user', ['users' => $users]);
    }
}
