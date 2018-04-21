<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use Illuminate\Http\Request;


class MinistryController extends Controller
{
    //set object
    public function __construct()
    {

    }

    //show all ministries
    public function get()
    {
        return Ministry::all();
    }

    //create ministry
    public function add(Request $request)
    {
        Ministry::create([
            'name'=> $request->input('name'),
            'leader_id'=> $request->input('leader_id'),
            'info'=> $request->input('info'),
        ]);
    }
}