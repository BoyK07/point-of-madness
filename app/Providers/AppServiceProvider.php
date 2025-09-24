<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use App\Models\Phrase;
use App\Observers\CacheInvalidationObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ImageManager::class, fn () => new ImageManager(new Driver()));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Media::observe(CacheInvalidationObserver::class);
        Link::observe(CacheInvalidationObserver::class);
        Event::observe(CacheInvalidationObserver::class);
        Phrase::observe(CacheInvalidationObserver::class);

        Blade::directive('phrase', function ($expression) {
            return "<?php echo e(phrase($expression)); ?>";
        });
    }
}
