<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Search Email. if there is no request in name='searchemail' then no filters are applied
    static function SearchEmail($posts, $request)
    {

        $searchemail = $request->get('searchemail');

        $i = 0;

        if ($searchemail) {
            foreach ($posts as $post) {
                if ($post->email == $searchemail) {

                    $i++;
                } else {
                    $posts->forget($i);
                    $i++;
                    //dd($i);
                }
            }
        }
        return $posts;
    }
}
