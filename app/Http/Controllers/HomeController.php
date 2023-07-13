<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Requests;
use App\Models\Connections;
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
        $userId     = Auth::user()->id;
        $requests   = Requests::where('user_id', $userId)
        ->orWhere('requested_user_id', $userId)->get();

        $sentReqs       = $requests->where('user_id', $userId)->where('status', 'Sent')->all();
        $receivedReqs   = $requests->where('requested_user_id', $userId)->where('status', 'Sent')->all();
        $sentReqIds     = collect($sentReqs)->pluck('requested_user_id')->toArray();
        $receivedReqIds = collect($receivedReqs)->pluck('user_id')->toArray();
        $requestsIds    = array_merge($sentReqIds, $receivedReqIds);

        $connections    = Connections::where('user_id', $userId)
        ->orWhere('connected_user_id', $userId)->get();

        $connectionsTo      = $connections->where('user_id', $userId)->pluck('connected_user_id')->toArray();
        $connectionsFrom    = $connections->where('connected_user_id', $userId)->pluck('user_id')->toArray();
        $connectionsIds     = array_merge($connectionsTo, $connectionsFrom);
        $connectionsCount   = count($connectionsIds);

        $notSuggestedUsersIds = array_merge($requestsIds, $connectionsIds);
        $users = User::whereNotIn('id', $notSuggestedUsersIds)->whereNot('id', $userId)->get();

        return view('home', compact('sentReqs', 'receivedReqs', 'connectionsCount', 'users'));
    }
}
