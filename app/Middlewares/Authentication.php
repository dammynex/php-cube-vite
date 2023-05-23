<?php

namespace App\Middlewares;

use Cube\Http\Request;
use Cube\Interfaces\MiddlewareInterface;

use Cube\Tools\Auth;

class Authentication implements MiddlewareInterface
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
        $user = Auth::user();

        if(!$user) {
            return redirect('/login');
        }

        $request->setCustomMethod('user', function () use ($user) {
            return $user;
        });

        return $request;
    }
}