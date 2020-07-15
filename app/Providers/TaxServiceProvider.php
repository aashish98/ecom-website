<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\AdminSettings;

class TaxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
            $tax = \Request::get('tax');
            if(!empty($tax))
            {
                config(['cart.tax'=>$tax]);
            }
            else
            {
                $taxx = AdminSettings::where('label','config.tax')->value('value');
                config(['cart.tax'=>$taxx]);
            }
        
    }
}
