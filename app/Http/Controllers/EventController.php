<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;

class EventController extends Controller
{
    use SchoolSession;

    public function __construct()
    {
        // Pas besoin d'injecter l'interface, le trait suffit
    }

    /**
     * Affiche les événements
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $current_school_session_id = $this->getSchoolCurrentSession();

            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->where('session_id', $current_school_session_id)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('events.index');
    }

    /**
     * Gestion des actions du calendrier : create, edit, delete
     */
    public function calendarEvents(Request $request)
    {
        $current_school_session_id = $this->getSchoolCurrentSession();
        $event = null;

        switch ($request->type) {
            case 'create':
                $event = Event::create([
                    'title'      => $request->title,
                    'start'      => $request->start,
                    'end'        => $request->end,
                    'session_id' => $current_school_session_id,
                ]);
                break;

            case 'edit':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end'   => $request->end,
                ]);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();
                break;
        }

        return response()->json($event);
    }
}