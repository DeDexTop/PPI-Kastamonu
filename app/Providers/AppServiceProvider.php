<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ActivityImage;
use App\Models\BlogImage;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            $activityImages = ActivityImage::select('image_path')
                ->inRandomOrder()
                ->take(3)
                ->get();

            $blogImages = BlogImage::select('image_path')
                ->inRandomOrder()
                ->take(3)
                ->get();

            $footerImages = $activityImages
                ->concat($blogImages)
                ->shuffle()
                ->take(6);

            $view->with('footerImages', $footerImages);
        });
    }
}