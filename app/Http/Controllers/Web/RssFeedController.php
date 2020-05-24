<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\RssFeed;
use App\News;
use Illuminate\Http\Request;

class RssFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.rss.index.index', ['rss_list' => RssFeed::all(), 'title' => 'RSS ленты']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.rss.create.index', ['title' => 'Добавить rss']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $rss = RssFeed::find($id);
        return view('admin.rss.show.index', ['rss' => $rss, 'news_list' => $rss->news()->get(), 'title' => $rss->rss_name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.rss.edit.index', ['rss' => RssFeed::find($id), 'title' => 'Редактирование rss']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $rss = RssFeed::find($id);
        $rss->rss_name = $request->input('name');
        $rss->rss_url = $request->input('url');
        $rss->save();
        return view('admin.rss.index.index',['rss_list' => RssFeed::all(), 'title' => 'Rss ленты']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        RssFeed::destroy($id);
        //return redirect('/admin/rss');
        return back();
    }
}
