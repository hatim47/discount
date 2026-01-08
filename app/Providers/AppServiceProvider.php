<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Region;
use App\Models\Store;
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
                $trending  = Store::where('trend', 1)
                                     ->where('store_region', $regionId)
                                     ->orderBy('created_at', 'desc')
                                     ->get();



             $dynapage = DynaPage::where('ismenu', '1')->where('dyna_region', $regionId)->get();
            } else {
                $categories = collect(); // Empty collection if no region
                $dynapage = collect();
            }
            $view->with('categoryies', $categories)->with('trending', $trending)->with('dynapage', $dynapage);
        });
        View::composer('*', function ($view) {


                    

     $regionCode = session('region', config('app.default_region', 'usa'));
            
            // Get region model
            $regionModel = Region::where('code', $regionCode)->first();
// Generate URL dynamically based on region code
$regionUrl = $regionModel && $regionModel->code !== config('app.default_region', 'usa')
    ? url('/' . $regionModel->code . '/')
    : url('/');


            if ($regionModel) {
                $regionId = $regionModel->id;
                    $setting = Setting::where('setting_region', $regionId)->first();
            } else {
                $setting = Setting::first();
            }
                    $view->with([
                'localeUrl' => $regionUrl,
                'setting'   => $setting,
            ]);
        });
    }
}
