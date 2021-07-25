<?php
namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EventController extends Controller {
    public function postCreateEvent(Request $request) {
        // Validation

        $this->validate($request, [
            'name' => 'required|max:100',
            'network' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);
        $event = new Event();
        $event->name  = $request['name'];
        $event->description = $request['description'];
        $message = 'There was an error';
        $event->network = $request['network'];
        $event->date = $request['date'];
        if ($request->user()->posts()->save($event)) {
            $message = "Post successfully created!";
        }

        return redirect()->route('event')->with(['message' => $message]);
    }

    public function getEvent() {
        $event = Event::orderBy('date', 'asc')->get();
        return view('event', ['events' => $event]);
    }

    public function getDeleteEvent($event_id) {
        $event = Event::where('id', $event_id)->first();
        if (Auth::user() != $event->user) {
            return redirect()->back();
        }
        $event->delete();
        return redirect()->route('event')->with(['message' => 'Successfully deleted']);
    }

    public function postEditEvent(Request $request) {
        $this -> validate($request, [
            'description' => 'required',
            'name' => 'required',
            'date' => 'required'
        ]);
        var_dump($request);
        $event = Event::find($request['eventId']);
        if (Auth::user() != $event->user) {
            return redirect()->back();
        }
        $event->description = $request['description'];
        $event->name = $request['name'];
        $event->date = $request['date'];

        $event->update();

        return response()->json(['new_description' => $event->description, 'new_name' => $event->name, 'new_date' => $event->date], 200);
    }
}
