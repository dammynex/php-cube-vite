<?php

namespace App\Middlewares;

use Cube\Tools\Csrf;
use Cube\Http\Request;
use Cube\Interfaces\MiddlewareInterface;

class CsrfMiddleware implements MiddlewareInterface
{
    /**
    * Trigger middleware event
    *
    * @param Request $request
    * @param array|null $args
    * @return mixed
    */
    public function trigger(Request $request, ?array $args = null)
    {   
        $token = $request->input('csrf_token');

        if(!Csrf::isValid($token)) {
            response()
                ->withSession('msg', 'Invalid request')
                ->redirect($request->url()->getPath());
        }

        return $request;
    }
}