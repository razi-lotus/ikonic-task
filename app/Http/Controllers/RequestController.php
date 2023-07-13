<?php

namespace App\Http\Controllers;

use App\Models\Connections;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\View\Components\RequestComponent;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $userId     = Auth::user()->id;
        if ($request->type == 'Sent') {
            $requests   = Requests::with(['sent'])->where('user_id', $userId)
            ->where('status', 'Sent')->get();
        }else {
            $requests   = Requests::with(['recevied'])->where('requested_user_id', $userId)
            ->where('status', 'Sent')->get();
        }
        return view('components.request', [
            'requests' => $requests
        ]);
    }

    public function acceptRequest($id)
    {
        $req = Requests::find($id);
        if ($req) {
            Connections::create([
                'user_id'           => Auth::user()->id,
                'connected_user_id' => $req->user_id,
            ]);
            $req->update(['status' => 'Accepted']);
            return response()->json(['status' => 200, 'message' => 'connection created successfully']);
        }
    }


    public function store(Request $request)
    {
        Requests::create([
            'user_id'           => Auth::user()->id,
            'requested_user_id' => $request->id,
            'status'            => 'Sent'
        ]);
        return response()->json(['status' => 200, 'message' => 'connection created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Requests::find($id);
        if ($request) {
            $request->delete();
            return response()->json(['status' => 200, 'message' => 'request canceled successfully']);
        }
    }
}
