<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCacheKey(String $cacheKey, $filters = [])
    {
        array_walk_recursive($filters, function ($value, $key) use (&$cacheKey) {
            $cacheKey .= "-{$key}-{$value}";
        });

        return $cacheKey;
    }
}
