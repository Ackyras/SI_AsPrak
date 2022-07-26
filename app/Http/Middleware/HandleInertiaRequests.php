<?php

namespace App\Http\Middleware;

use App\Models\Period;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';
    
    public function version(Request $request)
    {
        return parent::version($request);
    }
    
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
            'flash' => [
                'alert' => $request->session()->get('alert')
            ],
            'this_period' => function(){
                return Period::firstWhere('is_active', true);
            }
        ]);
    }
}
