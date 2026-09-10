<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of published articles.
     */
    public function index(): View
    {
        $articles = Article::published()
            ->latest('published_at')
            ->paginate(9);

        return view('pages.articles.index', compact('articles'));
    }

    /**
     * Display the specified published article.
     */
    public function show(string $slug): View
    {
        $article = Article::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.articles.show', compact('article'));
    }
}
