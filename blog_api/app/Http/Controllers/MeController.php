<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MeController extends Controller
{
    public function index(Request $request) {
        return response() -> json([
            'success' => true,
            'data' => $request->user()
        ]);
    }

    public function current(){
        return new UserResource(User::find(Auth::id()));
    }
}
