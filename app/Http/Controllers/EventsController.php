<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index() {
        $events = Events::all();
        return response()->json($events);
    }
        
    public function show(Events $event){
        $events = Events::with('participants')->find($event);
        
        return response()->json($events);
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

        Events::create($data);
    }

    public function edit(Events $event){
        //
    }

    public function update(Events $event, Request $request){
        $event->id = $request->id;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->data;
        $event->id_category = $request->id_category;
        $event->save();
    }

    public function destroy(Events $event){
        $event->delete();
    }
}
