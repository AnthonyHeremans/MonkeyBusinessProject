<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class eventController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function index()
    {
        return Event::all();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * @param Request $request
     * @param int eventId
     * @return Response
     */
    public function update(Request $request, $eventId)
    {

    }
}
