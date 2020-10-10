<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $teams = $user->teams()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'teams' => $teams,
                
            ];
        }
        
        return view('welcome', $data);
    }
    
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'location_add' => 'required|max:191', 
            'sports_name' => 'required|max:191',
            'rec_num' => 'required|max:191',
            'max_num' => 'required|max:191',
            'now_num' => 'required|max:191',
            'title' => 'required|max:191',
            'location' => 'required|max:191'
        ]);

        $request->user()->teams()->create([
            'content' => $request->content,
            'location_add' => $request->location_add, 
            'sports_name' => $request->sports_name,
            'rec_num' => $request->rec_num,
            'max_num' => $request->max_num,
            'now_num' => $request->now_num,
            'title' => $request->title,
            'location' => $request->location
        ]);

        return back();
    }    
    
    
    public function destroy($id)
    {
        $team = \App\Team::find($id);

        if (\Auth::id() === $team->user_id) {
            $team->delete();
        }

        return back();
    }    
    
    
    
    
    
    
    
}