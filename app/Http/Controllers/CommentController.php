<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateCommentRequest;
use App\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(CreateCommentRequest $request, Product $product)
    {
        $product->comments()->create(
            request()->only('body')
        );

        return redirect()->back()->with('success','Comment created and will be displayed after administrator verification.');
    }
}
