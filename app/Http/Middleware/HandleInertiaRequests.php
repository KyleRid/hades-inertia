<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\DB;
class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'app.name' => $this->getConfiguration()['app.name'],
            'app.description' => $this->getConfiguration()['app.description'],
            'app.allowLogin' => $this->getConfiguration()['app.allowLogin'],
        ]);
    }

    private function getConfiguration() {
        $config = DB::table('configurations')
                    ->whereIn('option_name', ['siteName', 'siteDescription', 'allowLogin'])
                    ->orderBy('option_id')
                    ->get();
        return [
            'app.name' => $config[0]->option_value ?? config('app.name'),
            'app.description' => $config[1]->option_value ?? config('app.description'),
            'app.allowLogin' => $config[2]->option_value ?? true,
        ];
    }
}
