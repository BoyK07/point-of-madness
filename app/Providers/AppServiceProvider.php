<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use App\Models\Phrase;
use App\Observers\EventObserver;
use App\Observers\LinkObserver;
use App\Observers\MediaObserver;
use App\Observers\PhraseObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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
        Media::observe(MediaObserver::class);
        Link::observe(LinkObserver::class);
        Phrase::observe(PhraseObserver::class);
        Event::observe(EventObserver::class);

        Blade::directive('phrase', function ($expression) {
            return "<?= e(phrase({$expression})); ?>";
        });

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
