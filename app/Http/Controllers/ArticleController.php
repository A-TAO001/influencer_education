<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article() {

    $articles = Article::all();

        return view('article');
    }
}
