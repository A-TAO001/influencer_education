<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

   public function __construct(){

        $this->article = new Article();
     
    }
    
    public function index() {
        
        $articles = $this->article->findAllArticles();
        $user = auth()->user();

        return view('user_notice_index', compact('articles'));

    }

}
