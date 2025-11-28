<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Region;
class SetRegion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle(Request $request, Closure $next): Response
    {
        $regionCode = $request->route('region') ?? config('app.default_region', 'usa');      
        // If no region in URL, use default
        if (!$regionCode) {
            $regionCode = config('app.default_region', 'usa');
        }
        
        // Try to get region from database
        $regionModel = Region::where('code', $regionCode)->first();
     
        if ($regionModel) {
            session(['region' => $regionModel->code]);
            config(['app.current_region' => $regionModel]);
            view()->share('currentRegion', $regionModel);
        } else {
            // Create a default region object if not in DB
            $defaultRegion = (object)[
                'id' => null,
                'code' => $regionCode,
                'title' => strtoupper($regionCode),
                'status' => 1
            ];
            
            session(['region' => $regionCode]);
            config(['app.current_region' => $defaultRegion]);
            view()->share('currentRegion', $defaultRegion);
        }

    return $next($request);
}

}

