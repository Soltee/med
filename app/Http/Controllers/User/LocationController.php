<?php

namespace App\Http\Controllers\User;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
	/*
		* store user location
	*/
	public function store(Request $request)
	{
		$data = $this->validate($request, [
			'address'   => 'string|min:4',
			'latitude'  => 'numeric',
			'longitude' => 'numeric',
		]);
		// dd($data);
		auth()->guard('user')->user()->locations()->create($data);

		return response()->json([
			'success' => true
		], 201);
	}
}
