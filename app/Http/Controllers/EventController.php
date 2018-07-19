<?php

namespace App\Http\Controllers;

use App\SocialEvent;
use Illuminate\Http\Request;

class EventController extends Controller {

    public function getAll(SocialEvent $event) {
        return $event->all()->toArray();
    }

    public function getEvent(SocialEvent $event, $id) {
        return SocialEvent::find($id)->toArray();
    }

    public function generateEvent(Request $request, SocialEvent $event) {
        $this->validate($request, ['photo' => 'nullable', 'name' => 'required', 'date_star' => 'required|date', 'date_end' => 'required|date', 'description' => 'required|max:255', 'location' => 'required']);
        SocialEvent::create(['photo' => $request->photo, 'name' => $request->name, 'date_star' => $request->date_star, 'date_end' => $request->date_end, 'description' => $request->description, 'location' => $request->location,]);
        return response()->json(null, 201);
    }

    public function deleteEvent(SocialEvent $event, $id) {
        $eventFound = SocialEvent::find($id);
        $eventFound->delete();
        return response()->json(['message' => "Evento borrado correctamente!"]);
    }

    public function editEvent(Request $request, $id) {
        SocialEvent::find($id)->update($request->all());
        return response()->json(['message' => "Evento actualizdo correctamente!"]);
    }
}
