<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Region;
use App\Models\DynaPage;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
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
     View::composer('website.layouts.header', function ($view) {
            // Get current region from session or use default
            $regionCode = session('region', config('app.default_region', 'usa'));
            
            // Get region model
            $regionModel = Region::where('code', $regionCode)->first();
            
            if ($regionModel) {
                $regionId = $regionModel->id;
                
                // Get categories for this region
                $categories = Category::with('stores')
                                     ->where('cate_region', $regionId)
                                     ->orderBy('name', 'asc') // Optional: order by name
                                     ->get();
             $dynapage = DynaPage::where('ismenu', '1')->where('dyna_region', $regionId)->get();
            } else {
                $categories = collect(); // Empty collection if no region
                $dynapage = collect();
            }
            $view->with('categoryies', $categories)->with('dynapage', $dynapage);
        });
        View::composer('*', function ($view) {


                    $localeUrl = env('APP_URL');
                    $locales = ['au','ca'];            
                    if (in_array(app()->getLocale(), $locales)) {
                        $localeUrl = env('APP_URL'). app()->getLocale() . '/';
                    }

     $regionCode = session('region', config('app.default_region', 'usa'));
            
            // Get region model
            $regionModel = Region::where('code', $regionCode)->first();
            
            if ($regionModel) {
                $regionId = $regionModel->id;
                    $setting = Setting::where('setting_region', $regionId)->first();
            } else {
                $setting = Setting::first();
            }
                    $view->with([
                'localeUrl' => $localeUrl,
                'setting'   => $setting,
            ]);
        });
    }
}
