<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function store (Request $request) {
        $person = new \App\Person($request->all());
        $person->save();
        return response()->json($person, \Illuminate\Http\Response::HTTP_OK);
    }

    public function buscar (Request $request) {
        $person = \App\Person::find(1);
        return response()->json($person,\Illuminate\Http\Response::HTTP_OK);
    }
}
