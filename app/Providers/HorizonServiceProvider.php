<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    public function boot()
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        // Horizon::routeMailNotificationsTo('example@example.com');
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');

        Horizon::night();
    }

    protected function gate()
    {
        Gate::define('viewHorizon', function (?\App\Models\User $user = null) {
            $cfg = config('tuning.stages');
            if (!is_array($cfg)) {
                $cfg = [$cfg];
            }
            $allowed = $cfg;
            $result = app()->environment($allowed);
            return $result;
        });
    }
}
