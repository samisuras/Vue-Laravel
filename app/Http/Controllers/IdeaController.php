<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;

class IdeaController extends Controller
{
    public function getIdeas(){
        return Idea::all();
    }

    public function store(Request $request){
        $this->validate($request, [
            'description' => 'required'
        ]);

        Idea::create($request->all());
        return;
    }
}
