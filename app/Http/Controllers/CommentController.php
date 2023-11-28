<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentsRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentsRequest $request, Idea $idea)
    {


        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['idea_id'] = $idea->id;

        Comment::create($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'comment posted successfully');
    }
}
