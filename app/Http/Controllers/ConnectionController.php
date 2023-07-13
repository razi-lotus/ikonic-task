<?php

namespace App\Http\Controllers;

use App\Models\Connections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getConnections()
    {
        $userId         = Auth::user()->id;
        $connections = Connections::where('user_id', $userId)
        ->orWhere('connected_user_id', $userId)->get();
        $connectedTo    = $connections->where('user_id', $userId)->pluck('connected_user_id');

        foreach ($connections as $connection) {
            $connection['user'] = $connection->user;
            $connection['connectionInCommon']  = $connection->getInConnections($connectedTo);
        }
        return view('components.connection', [
            'connections' => $connections
        ]);
    }

    public function deleteConnection($id)
    {
        $connection = Connections::find($id);
        if ($connection) {
            $connection->delete();

            return response()->json(['status' => 200, 'message' => 'connection deleted successfully']);
        }
    }
}
