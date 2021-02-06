<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index() {
        // $this->authorize('user', User::class);
        $user = User::paginate(5);
        return view('user.index', ['data' => $user]);
    }
}
