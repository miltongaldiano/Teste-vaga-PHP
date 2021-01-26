<?php
namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait RequestTrait {

    public function movies($action, $page = 1) {

        return Http::get(env('MVDB_URL').'/'.$action, [
            'api_key' => env('MVDB'),
            'page' => $page,
        ]);

    }
}