<?php

namespace App\Http\Controllers;

use App\Models\Article;


class ArticleController extends Controller
{
    public function index () {
        $articles= Article::allPaginate(9);
        return view('app.article.index', compact('articles'));

    }
}
