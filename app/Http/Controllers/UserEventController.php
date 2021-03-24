<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserEvent extends Controller
{
    public function index() {
        $userEvent = UserEvent::all();
        return response()->json($events);
    }
        
    public function show(UserEvent $userEvent){
        $userEvent = UserEvent::find($userEvent);
        return response()->json($userEvent);
    }

    public function store(){
        $data = [
            'name' => request('name'),
            'description' => request('description'),
            'date' => request('date'),
            'id_user_creator' => request('id_user_creator'),
            'id_category' => request('id_category'),
            'status' => request('status')
        ];

        $userEvent = UserEvent::create($data);

        $user = $userEvent->user;
        $user->notify();
    }

    public function edit(UserEvent $userEvent){
        //
    }

    public function update(UserEvent $userEvent, Request $request){
        $userEvent->id = $request->id;
        $userEvent->name = $request->name;
        $userEvent->description = $request->description;
        $userEvent->date = $request->data;
        $userEvent->id_category = $request->id_category;
        $userEvent->save();
    }

    public function destroy(UserEvent $userEvent){
        $user = $userEvent->user;

        $user->notify();

        $userEvent->delete();
    }
}
