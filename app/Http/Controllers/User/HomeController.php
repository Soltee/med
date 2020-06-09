<?php

namespace App\Http\Controllers\User;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$paginate  = auth()->guard('user')->user()->locations()->latest()->paginate(2);
        $locations = $paginate->items();
        $first     = $paginate->firstItem();
        $last      = $paginate->lastItem();
        $total     = $paginate->total();
        $prev      = $paginate->previousPageUrl();
        $next      = $paginate->nextPageUrl();
        return view('home', compact('locations', 'first', 'last', 'total', 'prev', 'next'));
    }
}
