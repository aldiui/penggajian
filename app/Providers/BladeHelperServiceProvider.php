<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Helpers\AllHelper;

class BladeHelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Blade::directive('formatRupiah', function ($expression) {
            return "<?php echo app('App\Helpers\AllHelper')->formatRupiah($expression); ?>";
});

Blade::directive('getNamaBulan', function ($expression) {
return "<?php echo app('App\Helpers\AllHelper')->getNamaBulan($expression); ?>";
});
}
}