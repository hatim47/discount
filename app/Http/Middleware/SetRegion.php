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
    public function handle($request, Closure $next)
{
$regionCode = $request->route('region') ?? 'us';

// dd($regionCode);
if ($regionCode && in_array($regionCode, ['ca', 'au'])) {
    $region = Region::where('code', $regionCode)->firstOrFail();
} else {
    // default US
    $region = Region::findOrFail(1);
}
dd([
    'route_params' => $request->route()->parameters(),
    'regionCode' => $regionCode,
    'path' => $request->path(),
]);
session([
    'region_id' => $region->id,
    'region_code' => $region->id == 1 ? null : $region->code,
]);

    return $next($request);
}

}

