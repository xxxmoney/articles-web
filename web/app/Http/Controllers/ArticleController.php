<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Shows articles previews.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get Articles
        $articles = Article::all();

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
    public function upsert(Request $request, $id = null)
    {
        // Get Article
        $article = Article::find($id);

        // Create Article
        if (!$article) {
            $article = new Article();
        }

        // Fill Article
        $article->fill($request->all());

        // Save Article
        $article->save();

        return redirect()->route('article.show', ['id' => $article->id]);
    }

}
