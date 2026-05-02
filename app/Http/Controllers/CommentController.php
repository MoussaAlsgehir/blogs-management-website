<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(StoreCommentRequest $request)
    {
        
        $data_validated = $request->validated();
        Comment::create($data_validated);
        return back()->with('successPublishedComment', 'Comment Published successfully');
        }
}
