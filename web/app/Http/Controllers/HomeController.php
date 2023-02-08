<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Uses Article model
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        // Gets all articles
        $articles = Article::all();

        return view('home.index', [
            'articles' => $articles
        ]);
    }

}
