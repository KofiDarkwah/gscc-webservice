<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //get one or all leader(s)
    public function get()
    {
        return Leader::all();
    }

    //get one leader
    public function show($id)
    {
        return Leader::findOrFail($id);
    }

    //add leader
    public function add(Request $request)
    {
        Leader::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'bio' => $request->input('bio')
        ]);

        //return json
        return response()->json(['message'=>'success'], 200);
    }

    //update leader
    public function edit(Request $request, $id)
    {
        $leader = Leader::where('id', $id);
        if(!$leader)
        {
            return response()->json(['status'=>'error', 'message'=>'Could not update user'], 401);
        }
        $leader->update($request->all());

        return response()->json(['status'=>'success', 'leader'=>$leader], 200);
    }

    //delete leader
    public function delete($id)
    {
        if(Leader::destroy($id)) {
            return response()->json(['status'=>'success', 'message'=>'leader deleted successfully']);
        }

        return response()->json(['status'=>'error', 'message'=>'Leader not found or Could not delete leader']);
    }
}
