<?php

namespace App\Http\Controllers;

use App\Models\Assistence;
use App\Models\Event;
use App\Models\Logistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->id_roles == 1) {
            $logistic = Logistic::where('id_users', '=', $user->id)->first();
            $assistedEventIds = Assistence::where('id_logistics','=', $logistic->id)->get()->pluck('id_events');
            // Obtener eventos futuros donde el usuario no se ha postulado
            // return $assistedEventIds;
            $events = Event::where('date', '>', date('Y-m-d'))
                            ->whereNotIn('id', $assistedEventIds)
                            ->get();
            return view('home', compact('user', 'events'));
        }
    }
}
