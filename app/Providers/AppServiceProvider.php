<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Twilio::macro('sendSms', function ($to, $message) {
            return $this->messages->create($to, [
                'from' => config('services.twilio.from'),
                'body' => $message,
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
