<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\GalleryPhoto;
use App\Observers\ArticleObserver;
use App\Observers\GalleryPhotoObserver;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set French locale for dates
        Carbon::setLocale('fr');
        setlocale(LC_TIME, 'fr_FR.UTF-8', 'fr_FR', 'fra', 'French');

        // Register model observers for image optimization
        Article::observe(ArticleObserver::class);
        GalleryPhoto::observe(GalleryPhotoObserver::class);
    }
}
