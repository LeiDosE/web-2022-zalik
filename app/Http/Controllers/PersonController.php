<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Person;
use \App\Http\Requests\PersonUpdateRequest;
use \App\Http\Requests\PersonDeleteRequest;

class PersonController extends Controller
{
    public function show (int $id) 
    {
        $person = Person::find($id);
        if ($person) {
            return response()->json([
                "data" => $person
            ]);
        }
        else {
            return response()->json([
                "message" => "Not found"
            ], 404);
        }
    }

    public function update (int $id, PersonUpdateRequest $request) 
    {
        $model = Person::find($id);
        if ($model) {
            $model->update($request->all());
            return response()->json([
                "data" => $model
            ]);
        }
    }

    public function destroy (int $id) 
    {
        $model = Person::find($id);
        if ($model) {
            $model->delete();
            return response()->json([
                "data" => $model
            ]);
        }
        else {
            return response()->json([
                "message" => "Not found"
            ], 404);
        }
    }

}
