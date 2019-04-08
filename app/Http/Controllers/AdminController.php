<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function users()
    {

        return view('users', [

            'users' => User::all()

        ]);

    }

    public function user(Request $request, User $user)
    {

        return view('tasks',[
            'tasks' => $user->tasks,
            'is_admin' => true
        ]);

    }

}
