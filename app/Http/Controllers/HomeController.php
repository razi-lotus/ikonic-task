<?php

namespace App\Http\Controllers;

use App\Models\Connections;
use App\Models\User;
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
        $connections = Connections::where('user_id', 1)
        ->get();
        $inConnections2 = [];
        foreach ($connections as $connection) {
            $inConnections      = $connection->getInConnections();
            $inConnections2[]   = $inConnections;

        }
        return collect($inConnections2)->flatten()->where('user_id', '!=', 1)->all();
        return view('home');
    }
}
