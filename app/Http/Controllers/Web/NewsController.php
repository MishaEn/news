<?php

namespace App\Http\Controllers\Web;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Resources\News;
use App\News as NewsModel;
use App\RssFeed;
use App\Http\Resources\News as NewsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        RssFeed::chunk(2, function ($rss_feeds) use (&$data) {
            array_push($data, $rss_feeds);
        });
        if(Auth::user() and Auth::user()->type==1){
            return view('admin.news.index.index', ['rss_list' => $data, 'title' => 'Новостной фид']);
        }
        return view('web.news.index', ['rss_list' => $data, 'title' => 'Новостной фид']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $comment = Comment::create([
            'user_id' => $user_id,
            'news_id' => $news_id,
            'comment_id' => null,
            'description' => $request->input('comment')
        ]);
        return redirect('/admin/news');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $news = NewsModel::find($id);
        return view('admin.news.show.index', ['news' => $news, 'title' => $news->title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.news.edit.index', ['news' => NewsModel::find($id), 'title' => 'Редактирование новости']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $news = NewsModel::find($id);
        $news->category = $request->input('category');
        $news->author = $request->input('author');
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->url = $request->input('url');
        $news->publication_date = $request->input('publication_date');
        $news->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        NewsModel::destroy($id);
        //return redirect('/admin/news');
        return back();
    }
}
