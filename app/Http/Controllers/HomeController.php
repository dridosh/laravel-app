<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $articles = Article::LastLimit(6);
        return view('app.home', compact('articles'));
    }

}
