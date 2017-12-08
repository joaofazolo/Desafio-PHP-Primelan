<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use \App\Person;

class PeopleController extends Controller
{
    public function create (Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|min:9',
        ]);


        $person = new Person($request->all());
        
        
        
        $person->save();

        return response()->json($person, \Illuminate\Http\Response::HTTP_CREATED);
    }

    public function retrieve (Person $person) {
        if(!$person)
            return response()->json(\Illuminate\Http\Response::HTTP_NOT_FOUND);

        return response()->json($person,\Illuminate\Http\Response::HTTP_OK);
    }

    public function delete (Person $person) {
        if(!$person)
            return response()->json(\Illuminate\Http\Response::HTTP_NOT_FOUND);
            
        $person->delete();

        return response()->json(null,\Illuminate\Http\Response::HTTP_NO_CONTENT);
    }

    public function getall() {

        return Person::all();
    }

    public function update(Request $request, Person $person){
        $person->update($request->all());

        return response()->json($person, 200);
    }
}