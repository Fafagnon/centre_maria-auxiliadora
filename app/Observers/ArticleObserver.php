<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\ImageOptimizer;
use Illuminate\Support\Facades\Storage;

class ArticleObserver
{
    public function saved(Article $article): void
    {
        if ($article->isDirty('cover_image') && !empty($article->cover_image)) {
            ImageOptimizer::optimize($article->cover_image, maxWidth: 1600, quality: 80);
        }
    }

    public function deleted(Article $article): void
    {
        if (!empty($article->cover_image) && Storage::disk('public')->exists($article->cover_image)) {
            Storage::disk('public')->delete($article->cover_image);
        }
    }
}
