<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreate;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreate $request)
    {

        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $create = News::create($data);
        if($create) {
            return back()->with('success', 'Новость успешно добавлена');
        }

        return back()->with('fail', 'Не удалось добавить новость');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsCreate $request, News $news)
    {

        $newsId = $news->id;
        $data = $request->validated();
        $news = News::find($newsId);
        $news->title       = $request->get('title');
        $news->description      = $request->get('description');
        $news->author = $request->get('author');
        $news->slug = Str::slug($request->get('title'));
        $save = $news->save();
        if($save){
            return redirect()->route('news.show', ['id' => $newsId])->with('update-success', 'News updated!');
        } else {
            return back()->with('fail', 'Something goes wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('remove-success', 'News deleted successfully');
    }
}
