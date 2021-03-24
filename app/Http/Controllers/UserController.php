<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function index() {
        $user = User::all();
        return response()->json($user);
    }
        
    public function show(User $user){
        $user = User::with(['eventsCreated', 'eventsParticipation'])->find($user);
        return response()->json($user);
    }

    
    public function edit(User $user){
        //
    }

    public function update(User $user, Request $request){
        $user->id = $request->id;
        $user->name = $request->name;
        $user->description = $request->description;
        $user->date = $request->data;
        $user->id_category = $request->id_category;
        $user->save();
    }

    public function destroy(User $user){
        $userEvent->delete();
    }
}
