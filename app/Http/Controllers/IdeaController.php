<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{


    public function show(Idea $idea){

        dd($idea->comments);
        return view("ideas.show", compact("idea"));
    }

    public function edit(Idea $idea){
        $editing = true;
        return view("ideas.show", compact("idea", "editing"));
    }
    public function update(Idea $idea){

       $validated = request()->validate([
            'content' => 'required|min:5|max:250'
        ]);


        $idea->content = request()->get('content', '');

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success','idea updated successfully');
    }

    public function store()
    {

      $validated =  request()->validate([
            'content' => 'required|min:5|max:250'
        ]);



        $idea = Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea was created successfully!');

    }

    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea was created successfully!');

    }
}
