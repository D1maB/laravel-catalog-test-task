<?php

namespace App\Http\Controllers\Dashboard;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Product $product)
    {
        $comments = $product->comments()->latest()->paginate(15);

        return view('dashboard.comments.index', [
            'product' => $product,
            'comments' => $comments,
        ]);
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Comment $comment)
    {
        $comment->is_verified = true;
        $comment->save();
        return redirect()->back()->with('success','Comment verified');
    }

    /**
     * @param Product $product
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product, Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success','Comment removed');
    }
}
