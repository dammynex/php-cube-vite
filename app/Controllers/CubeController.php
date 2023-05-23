<?php

namespace App\Controllers;

use Cube\Http\Response;
use Cube\Http\Request;
use Cube\Http\Controller;

class CubeController extends Controller
{
    /**
     * Home controller
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function home(Request $request, Response $response)
    {
        return $response->view('home');
    }
}