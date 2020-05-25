<?php

namespace App\Http\Controllers\Web;

use App\Comment;
use App\News;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $news_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($news_id)
    {
        $news = News::find($news_id);
        $comment = $news->comments()->where('comment_id', null)->get();
        if(Auth::user()->type == 1){
            return view('admin.comments.index.index', ['news' => $news, 'comments' => $comment, 'title' => 'Комментарии']);
        }
        return view('web.comments.main.index', ['news' => $news, 'comments' => $comment, 'title' => 'Комментарии']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $news_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $news_id)
    {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'news_id' => $news_id,
            'comment_id' => null,
            'description' => $request->input('comment')
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
