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
}
