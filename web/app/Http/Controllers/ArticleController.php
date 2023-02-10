<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['showEdit', 'showCreate', 'upsert', 'delete']);
    }

    /**
     * Shows articles previews.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Get Articles
        $articles;

        // Filters by current user if request contains filter_by_user parameter.
        if ($request->filter_by_user) {
            $articles = Article::where('user_id', auth()->user()->id)->get();
        }
        else {
            $articles = Article::all();
        }

        return view('article.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Shows article detail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        // Get Article
        $article = Article::findOrFail($id);

        return view('article.show', [
            'article' => $article
        ]);
    }

    /**
     * Shows article edit form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showEdit($id)
    {
        // Gets Article
        $article = Article::find($id);

        return view('article.upsert', [
            'article' => $article
        ]);
    }

    /**
     * Shows article create form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCreate()
    {
        return view('article.upsert', [
            'article' => null
        ]);
    }

    /**
     * Upserts article.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function upsert(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article;

        if ($request->id) {
            $article = Article::findOrFail($request->id);
            // Checks if user is owner of article.
            if ($article->user_id != auth()->user()->id) {
                throw new NotFoundHttpException('You are not owner of the article.');
            }
        } else {
            $article = new Article();
        }

        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect()->route('article_show', ['id' => $article->id]);
    }

    /**
     * Deletes article.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(Request $request)
    {
        $article = Article::findOrFail($request->id);
        $article->delete();

        return redirect()->route('articles');
    }

}
