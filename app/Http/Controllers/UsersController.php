<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Team; // 追加

class UsersController extends Controller
{

    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $teams = $user->feed_teams()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'teams' => $teams,
            ];
        }
        return view('welcome', $data);
    }
    
    
    public function show($id)
    {
        $user = User::find($id);
        $teams = $user->teams()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'teams' => $teams,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }


    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    
}